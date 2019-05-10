<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TurmasCreateRequest;
use App\Http\Requests\TurmasUpdateRequest;
use App\Presenters\TurmasPresenter;
use App\Repositories\CursosRepository;
use App\Repositories\DisciplinasRepository;
use App\Repositories\HorariosRepository;
use App\Repositories\ProfessoresRepository;
use App\Repositories\SemestresRepository;
use App\Repositories\TurmasRepository;
use App\Validators\TurmasValidator;

/**
 * Class TurmasController.
 *
 * @package namespace App\Http\Controllers;
 */
class TurmasController extends Controller
{
    /**
     * @var CursosRepository
     */
    protected $cursosRepository;

    /**
     * @var TurmasRepository
     */
    protected $repository;

    /**
     * @var DisciplinasRepository
     */
    protected $disciplinasRepository;

    /**
     * @var SemestresRepository
     */
    protected $semestresRepository;

    /**
     * @var ProfessoresRepository
     */
    protected $professoresRepository;

    /**
     * @var HorariosRepository
     */
    protected $horariosRepository;

    /**
     * @var TurmasValidator
     */
    protected $validator;

    /**
     * TurmasController constructor.
     *
     * @param TurmasRepository $repository
     * @param TurmasValidator $validator
     */
    public function __construct(CursosRepository $cursosRepository, HorariosRepository $horariosRepository, SemestresRepository $semestresRepository, DisciplinasRepository $disciplinasRepository, TurmasRepository $repository, ProfessoresRepository $professoresRepository, TurmasValidator $validator)
    {
        $this->horariosRepository = $horariosRepository;
        $this->disciplinasRepository = $disciplinasRepository;
        $this->professoresRepository = $professoresRepository;
        $this->semestresRepository = $semestresRepository;
        $this->cursosRepository = $cursosRepository;
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
        
        if (request()->wantsJson())  {
            $this->repository->setPresenter(TurmasPresenter::class);
            $turmas = $this->repository->all();
            
            return $turmas;
        }
        $turmas = $this->repository->all();
        $professores = $this->professoresRepository->all();
        $cursos = $this->cursosRepository->all();

        return view('turmas.index', compact('turmas', 'professores', 'cursos'));
    }

    public function create()
    {
        $professores = $this->professoresRepository->all();
        $semestres = $this->semestresRepository->all();
        $disciplinas = $this->disciplinasRepository->all();
        $horarios = $this->horariosRepository->all();

        return view('turmas.create', compact('professores', 'disciplinas', 'semestres', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TurmasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TurmasCreateRequest $request)
    {
        try 
        {   
            $data =  $request->all();

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $turma = $this->repository->create($data);

            if(isset($data['horarios'])) {
                foreach ((array) $data['horarios'] as $horario) {
                    $turma->horarios()->attach($horario);
                }
            }

            $response = [
                'success' => true,
                'message' => 'Turma criada.',
                'data'    => $turma->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            session()->flash('response', $response);

            return redirect()->back();
        } 
        catch (\Exception $e) 
        {
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
        $turma = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $turma,
            ]);
        }

        return view('turmas.show', compact('turma'));
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
        $turma = $this->repository->find($id);
        $professores = $this->professoresRepository->all();
        $semestres = $this->semestresRepository->all();
        $disciplinas = $this->disciplinasRepository->all();
        $horarios = $this->horariosRepository->all();

        return view('turmas.edit', compact('turma', 'professores', 'disciplinas', 'semestres', 'horarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TurmasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TurmasUpdateRequest $request, $id)
    {
        try 
        {
            $data = $request->all();

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $turma = $this->repository->update($data, $id);

            $turma->Horarios()->detach();

            if(isset($data['horarios'])) {
                foreach ((array) $data['horarios'] as $horario) {
                    $turma->horarios()->attach($horario);
                }
            }

            $response = [
                'success' => true,
                'message' => 'Turma alterada.',
                'data'    => $turma->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            session()->flash('response', $response);
            
            return redirect()->back();
        } 
        catch (\Exception $e) 
        {
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
        try 
        {
            $deleted = $this->repository->delete($id);

            $response = [
                'success' => true,
                'message' => 'Turma deletada.',
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

    public function getHorarios($id) {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $turma = $this->repository->find($id);

        if (request()->wantsJson())  {
            $this->repository->setPresenter(TurmasPresenter::class);
            return $turma->horarios;
        }
        $horarios = $turma->horarios;

        return view('turmas.horarios', compact('horarios', 'turma'));

    }
}
