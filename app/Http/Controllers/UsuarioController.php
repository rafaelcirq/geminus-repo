<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsuarioController extends Controller
{
    public function index(){
        
        return view('usuarios.cadastroUsuario');
    }

    public function trocarSenha(){
        return view('usuarios.trocarSenha');
    }


    function cadastrar(Request $request){
        
        $this->validation($request);
        $input = $request->except('_token');
        $request['password']= bcrypt($input['password']);
        User::create($request->all());
        return redirect('/listarusuario')->with('sucesso', 'Registro realizado com sucesso');
    }

    public function editar($id){
        $resource = User::find($id);
        return view('usuarios.cadastroUsuario', compact('resource'));
    }
    
   
    public function alterar(Request $request){
        $this->valida($request);
        
        User::where('id',$request->id)->update($request->all());
        return redirect('/listarusuario')->with('sucesso', 'Alteração realizada com sucesso');
    
    }


    function listar(Request $request){
        
        $usuarios= User::all();
        return view('usuarios.listarUsuarios')->with("usuarios", $usuarios );
        //return ["usuarios", $usuarios];

    }

    function list(){
        $usuarios= User::all();
        return $usuarios;
    }

    function excluir( $id){
        $user = User::find($id);
        $user->delete();
        //$usuarios = DB::table('usuario')->orderBy('cpf')->paginate(10);
        $usuarios= User::all();
        return redirect('/listarusuario')->with('sucesso', 'Exclusão realizada com sucesso')
        ->with("usuarios",  $usuarios );

    }

    function alterarSenha(Request $request){
        $password= Auth::user()->password;
      
           
            $this->validate($request, [
                'senhaantiga' => 'required|alpha_num|min:2',
                'novasenha' =>  'required|same:confirmarsenha|alpha_num|min:2',
                
            ], [
                'senhaantiga.min' => 'O campo Senha Atual precisa ter no mínimo 2 caracteres.',
                'novasenha.min' => 'O campo Nova Senha precisa ter no mínimo 2 caracteres.',
                'senhaantiga.required' => 'O campo Senha Atual é obrigatório.',
                'novasenha.required' => 'O campo Nova Senha é obrigatório.',
                'senhaantiga.alpha_num' => 'O campo Senha Atual precisa ser alfanumérico.',
                'novasenha.alpha_num' => 'O campo Nova Senha precisa ser alfanumérico.',
                'novasenha.same'  => 'O campo Confirmar Senha não é o mesmo de Nova Senha',
        
            ]);
        if(Hash::check($request['senhaantiga'], $password)){
            User::where('id', Auth::user()->id)->update(array('password' =>  bcrypt($request['novasenha'])));
            return redirect('/listarusuario')->with('sucesso', 'Senha alterada com sucesso');
        }else{
            return redirect('/trocarsenha')->with('main', 'Senha inserida não é a senha atual');
        }
     }


    function valida(Request $request){
   
        $this->validate($request, [
            'CPF' => 'required|numeric|digits:11',
            'email'=> 'required|email|'.Rule::unique('usuario')->ignore($request['id'])
            
        ], [
            'CPF.required' => 'O campo CPF é obrigatório.',
            'CPF.numeric' => 'O campo CPF precisa ser numérico.',
            'CPF.digits' => 'O campo CPF precisa ter 11 dígitos.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Email inválido. Por favor insira um endereço de Email válido.',
            'email.unique' => 'O Email inserido já está em uso'
        ]);
    }

    function validation(Request $request){
        
        $this->validate($request, [
            'CPF' => 'required|numeric|digits:11',
            'password' => 'required|alpha_num|min:2',
            'email'=> 'required|email|unique:usuario'
            
        ], [
            'CPF.required' => 'O campo CPF é obrigatório.',
            'password.min' => 'O campo senha precisa ter no mínimo 2 caracteres.',
            'CPF.numeric' => 'O campo CPF precisa ser numérico.',
            'CPF.digits' => 'O campo CPF precisa ter 11 dígitos.',
            'password.required' => 'O campo Senha é obrigatório.',
            'password.alpha_num' => 'O campo Senha precisa ser alfanumérico.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Email inválido. Por favor insira um endereço de Email válido.',
            'email.unique' => 'O Email inserido já está em uso'
        ]);
    }
    

}
