<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CursosCreateRequest;
use App\Http\Requests\CursosUpdateRequest;
use App\Repositories\CursosRepository;
use App\Validators\CursosValidator;

/**
 * Class CursosController.
 *
 * @package namespace App\Http\Controllers;
 */
class CursosController extends Controller
{
    /**
     * @var CursosRepository
     */
    protected $repository;

    /**
     * @var CursosValidator
     */
    protected $validator;

    /**
     * CursosController constructor.
     *
     * @param CursosRepository $repository
     * @param CursosValidator $validator
     */
    public function __construct(CursosRepository $repository, CursosValidator $validator)
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
        $cursos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cursos,
            ]);
        }

        return view('cursos.index', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CursosCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CursosCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $curso = $this->repository->create($request->all());

            $response = [
                'message' => 'Cursos created.',
                'data'    => $curso->toArray(),
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
        $curso = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $curso,
            ]);
        }

        return view('cursos.show', compact('curso'));
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
        $curso = $this->repository->find($id);

        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CursosUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CursosUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $curso = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cursos updated.',
                'data'    => $curso->toArray(),
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
                'message' => 'Cursos deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cursos deleted.');
    }
}
