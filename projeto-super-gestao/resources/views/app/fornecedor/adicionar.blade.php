@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Fornecedor - novo</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor.index') }}">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <form action="{{route('app.fornecedor.adicionar')}}" method="POST" class="form-fornecedores">
                @csrf
                <input type="text" value="{{old('nome')}}" name="nome" placeholder="Nome">
                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                
                <input type="text" value="{{old('site')}}" name="site" placeholder="Site">
                {{$errors->has('site') ? $errors->first('site') : ''}}

                <input type="text" value="{{old('uf')}}" name="uf" placeholder="UF">
                {{$errors->has('uf') ? $errors->first('uf') : ''}}

                <input type="text" value="{{old('email')}}" name="email" placeholder="E-mail">
                {{$errors->has('email') ? $errors->first('email') : ''}}

                <button type="submit">Cadastrar</button>
            </form>
        </div>  
    </div>
@endsection