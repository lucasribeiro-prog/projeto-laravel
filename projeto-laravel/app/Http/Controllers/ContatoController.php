<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function exibirContato() {
        $motivo_contato = [
            1 => 'Dúvida',
            2 => 'Elogio',
            3 => 'Reclamação'
        ];
        

        return view('site.contato', ['motivo_contato' => $motivo_contato]);
        
    }

    public function contato(Request $request) {
                /*echo '<pre>';
        dd($request);
        echo '</pre>';*/

        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);
       
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        
        /*echo '<pre>';
        var_dump($contato->getAttributes());
        echo '</pre>';*/

        return redirect()->back()->with('success', 'Sua solicitação será atendida em breve!');
    }
}
