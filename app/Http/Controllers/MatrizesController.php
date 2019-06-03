<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MatrizesCreateRequest;
use App\Http\Requests\MatrizesUpdateRequest;
use App\Repositories\MatrizesRepository;
use App\Repositories\CursosRepository;
use App\Presenters\MatrizesPresenter;
use App\Validators\MatrizesValidator;
use Validator;
use Illuminate\Validation\Rule;

/**
 * Class MatrizesController.
 *
 * @package namespace App\Http\Controllers;
 */
class MatrizesController extends Controller
{
    /**
     * @var MatrizesRepository
     */
    protected $repository;

    /**
     * @var MatrizesValidator
     */
    protected $validator;

    /**
     * MatrizesController constructor.
     *
     * @param MatrizesRepository $repository
     * @param MatrizesValidator $validator
     */
    public function __construct(CursosRepository $cursosRepository,MatrizesRepository $repository, MatrizesValidator $validator)
    {
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
            $this->repository->setPresenter(MatrizesPresenter::class);
            $matrizes = $this->repository->orderBy('nome', 'desc')->all();
            return $matrizes;
        }
        $matrizes = $this->repository->orderBy('nome', 'desc')->all();
        $cursos = $this->cursosRepository->orderBy('nome', 'asc')->all();

        return view('matrizes.index', compact( 'cursos', 'matrizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MatrizesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MatrizesCreateRequest $request)
    {
        try 
        {
            $data = $request->all();        
            $data['nome'] = $data['ano']."/".$data['semestre']; 
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $matriz = $this->repository->create($data);
            $response = [
                'success' => true,
                'message' => 'Registro realizado com sucesso',
                'data'    => $matriz->toArray(),
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
        $matrizes = $this->repository->find($id);
        $cursos = $this->cursosRepository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $matrizes,
            ]);
        }

        return view('matrizes.show', compact('matrizes','cursos'));
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
        $matrizes = $this->repository->find($id);
        $cursos = $this->cursosRepository->all();

        return view('matrizes.edit', compact('matrizes','cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatrizesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MatrizesUpdateRequest $request, $id)
    {
        try {

            $data = $request->all();        
            $data['nome'] = $data['ano']."/".$data['semestre']; 
            $this->validator->with($data)>setId($data['id'])->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $matrizes = $this->repository->update($data, $id);

            $response = [
                'success' => true,
                'message' => 'Registro alterado com sucesso',
                'data'    => $matrizes->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            session()->flash('response', $response);

            return redirect()->back();
        } catch (ValidatorException $e) {

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

    public function create()
    {
        $cursos = $this->cursosRepository->all();

        return view('matrizes.create', compact('cursos'));
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
                'message' => 'Exclusão realizada com sucesso.',
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
