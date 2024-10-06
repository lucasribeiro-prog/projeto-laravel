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
        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == '') {
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
            $salvar = $fornecedor->save();
            if($salvar) {
                $msg = 'Cadastro realizado com sucesso!';
            } else {
                $msg = 'Falha ao tentar cadastrar o fornecedor';
            }

        } 
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update) {
                $msg = 'Fornecedor atualizado com sucesso!';
            } else {
                $msg = 'Falha ao tentar atualizar os dados';
            }
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function listar(Request $request) {
        
        $fornecedor = Fornecedor::with('produtos')
        ->where('nome', 'like', '%'. $request->nome .'%')
        ->where('site', 'like', '%'. $request->site .'%')
        ->where('uf', 'like', '%'. $request->uf .'%')
        ->where('email', 'like', '%'. $request->email .'%')
        ->simplePaginate(5);

        //dd($fornecedor);
        
        return view('app.fornecedor.listar', ['fornecedor' => $fornecedor, 'request' => $request->all()]);
    }

    public function editar($id) {

        /*$filtro = Fornecedor::where('id', $id)->get();
        $fornecedor = $filtro->first();*/
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();
        return view('app.fornecedor.index');
    }
}
