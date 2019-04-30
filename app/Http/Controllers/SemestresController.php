<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SemestresCreateRequest;
use App\Http\Requests\SemestresUpdateRequest;
use App\Repositories\SemestresRepository;
use App\Validators\SemestresValidator;

/**
 * Class SemestresController.
 *
 * @package namespace App\Http\Controllers;
 */
class SemestresController extends Controller
{
    /**
     * @var SemestresRepository
     */
    protected $repository;

    /**
     * @var SemestresValidator
     */
    protected $validator;

    /**
     * SemestresController constructor.
     *
     * @param SemestresRepository $repository
     * @param SemestresValidator $validator
     */
    public function __construct(SemestresRepository $repository, SemestresValidator $validator)
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
        $semestres = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $semestres,
            ]);
        }

        return view('semestres.index', compact('semestres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SemestresCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SemestresCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $semestre = $this->repository->create($request->all());

            $response = [
                'message' => 'Semestres created.',
                'data'    => $semestre->toArray(),
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
        $semestre = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $semestre,
            ]);
        }

        return view('semestres.show', compact('semestre'));
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
        $semestre = $this->repository->find($id);

        return view('semestres.edit', compact('semestre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SemestresUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SemestresUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $semestre = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Semestres updated.',
                'data'    => $semestre->toArray(),
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
                'message' => 'Semestres deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Semestres deleted.');
    }
}
