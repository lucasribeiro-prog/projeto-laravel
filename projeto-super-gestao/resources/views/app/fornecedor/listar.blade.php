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
                            <td>Excluir</td>
                            <td><a href="{{route('app.fornecedor.editar', $valor->id)}}">Editar</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>  
    </div>
@endsection