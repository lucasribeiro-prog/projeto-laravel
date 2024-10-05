@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Listagem de Produto</h1>
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
                        <th>Fornecedor</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
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
                            <td>{{$valor->fornecedor->nome}}</td>
                            <td>{{$valor->produtoDetalhe->comprimento ?? ''}}</td>
                            <td>{{$valor->produtoDetalhe->altura ?? ''}}</td>
                            <td>{{$valor->produtoDetalhe->largura ?? ''}}</td>
                            <td><a href="{{route('produto.show', ['produto' => $valor->id])}}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$valor->id}}" action="{{route('produto.destroy', ['produto' => $valor->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$valor->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route('produto.edit', ['produto' => $valor->id])}}">Editar</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$produto->appends($request)->links()}}
        </div>  
    </div>
@endsection