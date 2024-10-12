@extends('app.layouts.basico')
@section('titulo', 'Pedido-Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">

            <h1>Novo Pedido</h1>
           
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div><br>

        <h4>Detalhes do pedidos</h4>
        <p style="color:black">ID Pedido: {{$pedido->id}}</p>
        <p style="color:black">Cliente: {{$pedido->cliente_id}}</p>

        <h4>Itens do pedido</h4>
        <table class="tabela-pedidos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do produto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->produtos as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->nome}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="informacao-pagina">
            @component('app.pedido-produto._components.form_create', ['pedido' => $pedido, 'produto' => $produto])
                
            @endcomponent
        </div>  
    </div>
@endsection