<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Symfony\Contracts\Service\Attribute\Required;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function adicionar(Request $request) {

        if($request->input('_token') != '') {
            $regra = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feeedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no maximo 2 caracteres',
                'email' => 'O e-mail informado não é válido',
            ];

            $request->validate($regra, $feeedback);
            
            $fornecedor = new Fornecedor();
            $fornecedor->nome = $request->input('nome');
            $fornecedor->site = $request->input('site');
            $fornecedor->uf = $request->input('uf');
            $fornecedor->email = $request->input('email');
            //print_r($fornecedor);
            $fornecedor->save();
        }

        return view('app.fornecedor.adicionar');
    }

    public function listar(Request $request) {
        
        $fornecedor = Fornecedor::
        where('nome', 'like', '%'. $request->nome .'%')
        ->where('site', 'like', '%'. $request->site .'%')
        ->where('uf', 'like', '%'. $request->uf .'%')
        ->where('email', 'like', '%'. $request->email .'%')
        ->get();

        
        return view('app.fornecedor.listar', ['fornecedor' => $fornecedor]);
    }
}
