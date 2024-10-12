<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produto = Produto::paginate(15);
        /*foreach ($produto as $value) {
            dd($value->pedidos); // Aqui você pode ver os 'pedidos' de cada 'produto'
        }*/

        return view('app.produto.index', ['produto' => $produto, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidade = Unidade::all();
        return view('app.produto.create', ['unidade' => $unidade, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regra = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve possuir no mínimo 3 caracteres',
            'nome.max' => 'O nome deve conter no máximo 40 caracteres',
            'descricao.max' => 'A descrição deve conter no máximo 2000 caracteres',
            'peso.integer' => 'caracter inválido',
            'unidade_id.exists' => 'Selecione um opção válida',
            'fornecedor_id.exists' => 'Selecione um opção'
        ];

        $request->validate($regra, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidade = Unidade::all();
        $fornecedores = Fornecedor::all();
        //dd($fornecedores);
        return view('app.produto.edit', ['produto' => $produto, 'unidade' => $unidade, 'fornecedores' => $fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidade' => $unidade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $regra = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve possuir no mínimo 3 caracteres',
            'nome.max' => 'O nome deve conter no máximo 40 caracteres',
            'descricao.max' => 'A descrição deve conter no máximo 2000 caracteres',
            'peso.integer' => 'caracter inválido',
            'unidade_id.exists' => 'Selecione um opção válida',
            'fornecedor_id.exists' => 'Selecione um opção'
        ];

        $request->validate($regra, $feedback);

        //dd($produto);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
