<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';
        if($request->get('erro') == 1) {
            $erro = 'usuario e ou senha incorretos';
        }

        if($request->get('erro') == 2) {
            $erro = 'Acesso negado, faça o login primeiro';
        }

        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request) {

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'E-mail inválido',
            'senha.required' => 'A senha informada está incorreta'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');
        

        $user = new User();
        $usuario  = $user->where('email', $email)->where('password', $password)->get()->first();

        if($usuario) {
            session_start();
            $_SESSION['name'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
