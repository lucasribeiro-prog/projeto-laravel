@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina2">
            <table class="tabela-fornecedores">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade_id</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($produto as $valor)
                        <tr>
                            <td>{{$valor->nome}}</td>
                            <td>{{$valor->descricao}}</td>
                            <td>{{$valor->peso}}</td>
                            <td>{{$valor->unidade_id}}</td>
                            <td><a href="{{route('app.fornecedor.excluir', $valor->id)}}">Excluir</a></td>
                            <td><a href="{{route('app.fornecedor.editar', $valor->id)}}">Editar</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$produto->appends($request)->links()}}
        </div>  
    </div>
@endsection