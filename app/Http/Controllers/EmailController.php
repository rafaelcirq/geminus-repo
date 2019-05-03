<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\User;
use App\Http\Controllers\MainController;

class EmailController extends Controller{
    private $email;
    private $controle;

    function index()
    {
        return view('esqueceusenha');
    }

    function validaremail(Request $request)
    {
        $this->email = $request->get('email');
        

        $this->validate($request, [
            'email' => 'required|email',

        ], [
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Email inválido. Por favor insira um endereço de Email válido.'
        ]);

        if (User::where('email', '=', $this->email)->exists()) {
           
            $controle = new MainController;

            $senha= $controle->gerarSenha();
            $this->enviarEmail($senha);
            $controle->atualizaSenha($senha, $this->email);
            $menssagem ='A nova senha foi enviada para o Email informado.';
            return redirect('/esqueceusenha')->with('sucesso', $menssagem);
         }
        else {
            $menssagem = ('Não existe usuário com esse Email cadastrado. Por favor verifique a escrita e tente novamente.');
            return redirect('/esqueceusenha')->with('error', $menssagem);

        }
    }

    public function enviarEmail($senha)
    {
        $data = array('name' => "Geminus",'senha' => $senha);
        $menssagem = ('Nova senha gerada.');

        Mail::send(['html' => 'novasenha'], $data, function ($message) {
            $message->to($this->email, 'Administração Geminus')->subject('Nova senha de acesso');
            $message->from('geminusueg@gmail.com', 'Administração Geminus');
        });

    }
}
