@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Fornecedor - Listar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor.index') }}">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina2">
            <table class="tabela-fornecedores">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($fornecedor as $valor)
                        <tr>
                            <td>{{$valor->nome}}</td>
                            <td>{{$valor->site}}</td>
                            <td>{{$valor->uf}}</td>
                            <td>{{$valor->email}}</td>
                            <td><a href="{{route('app.fornecedor.excluir', $valor->id)}}">Excluir</a></td>
                            <td><a href="{{route('app.fornecedor.editar', $valor->id)}}">Editar</a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p style="color:black">Lista de Produtos</p>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($valor->produtos as $key => $produto)
                                            <tr>
                                                <td>{{$produto->id}}</td>
                                                <td>{{$produto->nome}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$fornecedor->appends($request)->links()}}
        </div>  
    </div>
@endsection