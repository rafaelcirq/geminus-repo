<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DisciplinasCreateRequest;
use App\Presenters\DisciplinasPresenter;
use App\Http\Requests\DisciplinasUpdateRequest;
use App\Repositories\CursosRepository;
use App\Repositories\DisciplinasRepository;
use App\Repositories\MatrizesRepository;
use App\Repositories\TurmasRepository;
use App\Validators\DisciplinasValidator;
use App\Entities\Disciplinas;

/**
 * Class DisciplinasController.
 *
 * @package namespace App\Http\Controllers;
 */
class DisciplinasController extends Controller
{
    /**
     * @var TurmasRepository
     */
    protected $turmasRepository;

    /**
     * @var CursosRepository
     */
    protected $cursosRepository;

    /**
     * @var DisciplinasRepository
     */
    protected $repository;

    /**
     * @var MatrizesRepository
     */
    protected $matrizesRepository;

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
    public function __construct(TurmasRepository $turmasRepository, CursosRepository $cursosRepository, DisciplinasRepository $repository, MatrizesRepository $matrizesRepository, DisciplinasValidator $validator)
    {
        $this->cursosRepository = $cursosRepository;
        $this->turmasRepository = $turmasRepository;
        $this->matrizesRepository = $matrizesRepository;
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

        if (request()->wantsJson()) {
            $this->repository->setPresenter(DisciplinasPresenter::class);
            $disciplinas = $this->repository->all();
            return $disciplinas;
        }
        $disciplinas = $this->repository->all();
        $cursos = $this->cursosRepository->all();
        $matrizes = $this->matrizesRepository->all();

        return view('disciplinas.index', compact('disciplinas', 'cursos', 'matrizes'));
    }

    public function create()
    {
        $turmas = $this->turmasRepository->all();
        $matrizes = $this->matrizesRepository->all();
        $disciplinas = $this->repository->all();

        return view('disciplinas.create', compact('matrizes', 'disciplinas', 'turmas'));
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
            $data = $request->all();
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $disciplina = $this->repository->create($data);

            if (isset($data['pre_requisitos'])) {
                $disciplina->preRequisitos()->attach($data['pre_requisitos']);
            }
            if (isset($data['equivalencias'])) {
                $disciplina->equivalencias()->attach($data['equivalencias']);
            }

            // dd($disciplina);

            $response = [
                'success' => true,
                'message' => 'Disciplina criada.',
                'data'    => $disciplina->toArray(),
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
        $disciplina = $this->repository->find($id);

        dd('show', $disciplina);

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
        $turmas = $this->turmasRepository->all();
        $matrizes = $this->matrizesRepository->all();
        $disciplinas = $this->repository->all();

        return view('disciplinas.edit', compact('disciplina', 'matrizes', 'disciplinas', 'turmas'));
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
            $data = $request->all();

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $disciplina = $this->repository->update($data, $id);

            $disciplina->preRequisitos()->detach();
            $disciplina->equivalencias()->detach();

            if (isset($data['pre_requisitos'])) {
                $disciplina->preRequisitos()->sync($data['pre_requisitos']);
            }
            if (isset($data['equivalencias'])) {
                $disciplina->equivalencias()->sync($data['equivalencias']);
            }

            $response = [
                'success' => true,
                'message' => 'Disciplina alterada.',
                'data'    => $disciplina->toArray(),
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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->repository->delete($id);

            $response = [
                'success' => true,
                'message' => 'Disciplina deletada.',
                'data'    => $deleted,
            ];

            if (request()->wantsJson()) {
                return response()->json($response);
            }

            session()->flash('response', $response);

            return redirect()->back();
        } catch (\Exception $e) {
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

    public function equivalencias()
    {
        $matrizes = $this->matrizesRepository->all();

        return view('disciplinas.equivalencias', compact('matrizes'));
    }

    public function getEquivalencias($id)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $disciplina = $this->repository->find($id);

        return view('disciplinas.equivalencias-modal', compact('disciplina'));
    }

    public function getDisciplinasByMatriz($matrizId)
    {
        if (request()->wantsJson()) {
            $this->repository->setPresenter(DisciplinasPresenter::class);
            $disciplinas = $this->repository->findByField('matrizes_id', $matrizId);
            return $disciplinas;
        } else {
            dd($disciplinas = $this->repository->findByField('matrizes_id', $matrizId));
        }
    }
}
