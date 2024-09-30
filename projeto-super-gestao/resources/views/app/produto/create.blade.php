@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Produto - novo</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <form action="{{route('produto.store')}}" method="POST" class="form-fornecedores">
                @csrf

                <input type="text" value="" name="nome" placeholder="Nome">
                
                
                <input type="text" value="" name="descricao" placeholder="Descricao">
                

                <input type="text" value="" name="peso" placeholder="Peso">
                

                <select name="unidade_id">
                        <option value="">Selecione uma unidade de medida</option>
                    @foreach ($unidade as $value)
                        <option value="{{$value->id}}">{{$value->descricao}}</option>
                    @endforeach
                </select>
                

                <button type="submit">Cadastrar</button>
            </form>
        </div>  
    </div>
@endsection