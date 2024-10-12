@extends('app.layouts.basico')
@section('titulo', 'Pedido')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Pedidos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina2">
            <table class="tabela-fornecedores">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($pedido as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->cliente_id}}</td>
                            <td><a href="{{route('app.pedido-produto.create', ['pedido' => $value->id])}}">Adicionar Produtos</a></td>
                            <td><a href="">Visualizar</a></td>
                            <td>
                                <form id="form_{{$value->id}}" action="{{route('pedido.destroy', ['pedido' => $value->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$value->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route('pedido.edit', ['pedido' => $value->id])}}">Editar</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>  
    </div>
@endsection