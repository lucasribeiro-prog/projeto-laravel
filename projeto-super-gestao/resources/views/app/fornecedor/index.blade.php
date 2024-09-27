@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Fornecedor</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor.index') }}">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <form action="{{route('app.fornecedor.listar')}}" method="POST" class="form-fornecedores">
                @csrf
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="site" placeholder="Site">
                <input type="text" name="uf" placeholder="UF">
                <input type="text" name="email" placeholder="E-mail">
                <button type="submit">Pesquisar</button>
            </form>
        </div>  
    </div>
@endsection