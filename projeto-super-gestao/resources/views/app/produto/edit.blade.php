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
            <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="POST" class="form-fornecedores">
                @csrf
                @method('PUT')

                <input type="text" value="{{$produto->nome ?? old('nome')}}" name="nome" placeholder="Nome">
                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                
                <input type="text" value="{{$produto->descricao ?? old('descricao')}}" name="descricao" placeholder="Descricao">
                {{$errors->has('descricao') ? $errors->first('descricao') : ''}}

                <input type="text" value="{{$produto->peso ?? old('peso')}}" name="peso" placeholder="Peso">
                {{$errors->has('peso') ? $errors->first('peso') : ''}}

                <select name="unidade_id">
                        <option value="">Selecione uma unidade de medida</option>
                    @foreach ($unidade as $value)
                        <option value="{{$value->id}}" {{$produto->unidade_id ?? old('unidade_id') == $value->id ? 'selected' : ''}}>{{$value->descricao}}</option>
                    @endforeach
                </select>
                {{$errors->has('unidade_id')?$errors->first('unidade_id'):''}}
                

                <button type="submit">Cadastrar</button>
            </form>
        </div>  
    </div>
@endsection