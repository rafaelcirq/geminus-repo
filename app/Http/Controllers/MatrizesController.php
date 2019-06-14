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
            $response = $this->validaCreate($request);
            if($response['success']){
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

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->withErrors($response['message'])->withInput();
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

    public function validaCreate(MatrizesCreateRequest $data){
        $nome =  $data['ano']."/".$data['semestre']; 
        $cursos = $data['cursos_id'];
        $messages = [
            'nome.cursos_id.unique' => 'Matriz já cadastrada',
        ];
        $response = $this->repository->findWhere([
            'nome' => $nome,
            'cursos_id' => $cursos
            //['id', '!=', $data['id']
        ]);

        if(count($response)>0){
            return $response = [
                'success' => false,
                'message' => "Matriz já cadastrada",
            ];
        }
        return  $response = [
            'success' => true
        ];
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
            $this->validator->with($data)->setId($data['id'])->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $response = $this->validaUpdate($request);
            if($response['success']){
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
            }
            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->withErrors($response['message'])->withInput();
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
    public function validaUpdate(MatrizesUpdateRequest $data){
        $nome =  $data['ano']."/".$data['semestre']; 
        $cursos = $data['cursos_id'];
        $messages = [
            'nome.cursos_id.unique' => 'Matriz já cadastrada',
        ];
        $response = $this->repository->findWhere([
            'nome' => $nome,
            'cursos_id' => $cursos
        ]);

        if(count($response)>1){
            return $return = [
                'success' => false,
                'message' => "Matriz já cadastrada",
            ];
          
        }
        else if(count($response)==1){
            if($response[0]['id']==$data['id']){
                return $response = [
                    'success' => true];
            }
            else{
                return $return = [
                    'success' => false,
                    'message' => "Matriz já cadastrada",
                ];
            }
        }
        return $response = [
            'success' => true];
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
