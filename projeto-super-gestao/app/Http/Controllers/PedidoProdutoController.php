<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produto = Produto::all();
        return view('app.pedido-produto.create', ['pedido' => $pedido, 'produto' => $produto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regra = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];
        $feedback = [
            'produto_id.exists' => 'Informe um produto válido',
            'quantidade.required' => 'Campo obrigatorio'
        ];

        $request->validate($regra, $feedback);
        /*$pedido_produto = new PedidoProduto();
        $pedido_produto->pedido_id = $pedido->id;
        $pedido_produto->produto_id = $request->get('produto_id');
        $pedido_produto->save();*/

        $pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);

        return redirect()->route('app.pedido-produto.create', ['pedido' => $pedido]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
