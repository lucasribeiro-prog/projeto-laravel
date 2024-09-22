<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function exibirContato() {
        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['motivo_contato' => $motivo_contato]);
        
    }

    public function contato(Request $request) {
                /*echo '<pre>';
        dd($request);
        echo '</pre>';*/

        $request->validate(
            [
                'nome' => 'required|unique:site_contatos',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contato_id' => 'required',
                'mensagem' => 'required'
            ],

            [
                'required' => 'O campo deve ser preenchido',
                'unique' => 'O usuario já está cadastrado',
                'email' => 'Informe um email válido',
            ]
        );
       
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato_id = $request->input('motivo_contato_id');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        
        /*echo '<pre>';
        var_dump($contato->getAttributes());
        echo '</pre>';*/

        return redirect()->back()->with('success', 'Sua solicitação será atendida em breve!');
    }
}
