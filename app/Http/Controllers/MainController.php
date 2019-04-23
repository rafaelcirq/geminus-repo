<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MainController extends Controller
{
    public function index(){
        return view('login');
    }
    
    public function sucesso() {
        return view('geminus');
    }

    function checkLogin (Request $request ){
        $request['cpf']= str_replace(['.','-'],'',$request['cpf']);
        $this->validate($request, [
            'cpf' => 'required|numeric|digits:11',
            'password' => 'required|alpha_num|min:2'
            
        ], [
            'cpf.required' => 'O campo CPF é obrigatório.',
            'password.min' => 'O campo senha precisa ter no mínimo 2 caracteres.',
            'cpf.numeric' => 'O campo CPF precisa ser numérico.',
            'cpf.digits' => 'O campo CPF precisa ter 11 dígitos.',
            'password.required' => 'O campo Senha é obrigatório.',
            'password.alpha_num' => 'O campo Senha precisa ser alfanumérico.',
            
        ]);
            $userData = array(
                'cpf' =>$request->get('cpf'),
                'password' => $request->get('password'),
                 
            );

            

            if(Auth::attempt($userData)){
                return redirect('geminus');
             
            }
            else{
                info($userData);
                return back()->with('error', 'Login ou senha incorretos');
              
            }
    }

    function sucessLogin(){
        return redirect('geminus');
    }
    function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function atualizasenha($password,$email)
    {
        $user_id = User::select('id')->where('email', $email)->first();
        $user_id->password = hash::make($password);
        $user_id->save();
    }

    function gerarsenha()
    {
        return str_random(8);
    }

}
