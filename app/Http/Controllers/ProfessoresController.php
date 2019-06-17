<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProfessoresCreateRequest;
use App\Http\Requests\ProfessoresUpdateRequest;
use App\Repositories\ProfessoresRepository;
use App\Validators\ProfessoresValidator;

/**
 * Class ProfessoresController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProfessoresController extends Controller
{
    /**
     * @var ProfessoresRepository
     */
    protected $repository;

    /**
     * @var ProfessoresValidator
     */
    protected $validator;

    /**
     * ProfessoresController constructor.
     *
     * @param ProfessoresRepository $repository
     * @param ProfessoresValidator $validator
     */
    public function __construct(ProfessoresRepository $repository, ProfessoresValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $professores = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professores,
            ]);
        }

        return view('professores.index', compact('professores'));
    }

    public function create()
    {
        return view('professores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProfessoresCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProfessoresCreateRequest $request)
    {
        try {
            $data =  $request->all();

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $professor = $this->repository->create($data);

            $response = [
                'success' => true,
                'message' => 'Professor cadastrado.',
                'data'    => $professor->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            session()->flash('response', $response);

            return redirect()->back();
        } catch (\Exception $e) {
            // If errors...
            switch (get_class($e)) {

                case ValidatorException::class:
                    $message = $e->getMessageBag();
                    break;
                default:
                    $message = $e->getMessage();
                    break;
            }

            $response = [
                'success' => false,
                'message' => $message,
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->withErrors($response['message'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professore = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $professore,
            ]);
        }

        return view('professores.show', compact('professore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = $this->repository->find($id);

        return view('professores.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProfessoresUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProfessoresUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $professore = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Professores updated.',
                'data'    => $professore->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            $deleted = $this->repository->delete($id);

            $response = [
                'success' => true,
                'message' => 'Profesor deletado.',
                'data'    => $deleted,
            ];

            if (request()->wantsJson()) {
                return response()->json($response);
            }

            session()->flash('response', $response);

            return redirect()->back();
        }
        catch (\Exception $e) 
        {
            // dd($e);            
            $message = $e->getMessage();

            $response = [
                'success' => false,
                'message' => $message,
            ];

            if (request()->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->withErrors($response['message'])->withInput();
        }
    }
}
