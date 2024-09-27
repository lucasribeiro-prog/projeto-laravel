@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Fornecedor - consultar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor.index') }}">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            Listar...
        </div>  
    </div>
@endsection