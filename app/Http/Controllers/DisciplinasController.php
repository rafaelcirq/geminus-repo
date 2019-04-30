<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DisciplinasCreateRequest;
use App\Http\Requests\DisciplinasUpdateRequest;
use App\Repositories\DisciplinasRepository;
use App\Validators\DisciplinasValidator;

/**
 * Class DisciplinasController.
 *
 * @package namespace App\Http\Controllers;
 */
class DisciplinasController extends Controller
{
    /**
     * @var DisciplinasRepository
     */
    protected $repository;

    /**
     * @var DisciplinasValidator
     */
    protected $validator;

    /**
     * DisciplinasController constructor.
     *
     * @param DisciplinasRepository $repository
     * @param DisciplinasValidator $validator
     */
    public function __construct(DisciplinasRepository $repository, DisciplinasValidator $validator)
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
        $disciplinas = $this->repository->all();
        // foreach($disciplinas as $d) {
        //     dd($d->matriz());
        // }

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $disciplinas,
            ]);
        }

        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DisciplinasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DisciplinasCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $disciplina = $this->repository->create($request->all());

            $response = [
                'message' => 'Disciplinas created.',
                'data'    => $disciplina->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disciplina = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $disciplina,
            ]);
        }

        return view('disciplinas.show', compact('disciplina'));
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
        $disciplina = $this->repository->find($id);

        return view('disciplinas.edit', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DisciplinasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DisciplinasUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $disciplina = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Disciplinas updated.',
                'data'    => $disciplina->toArray(),
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Disciplinas deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Disciplinas deleted.');
    }
}
