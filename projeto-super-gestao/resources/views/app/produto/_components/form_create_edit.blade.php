@if (isset($produto->id))
    <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="POST" class="form-fornecedores">
        @csrf
        @method('PUT')   
@else
    <form action="{{route('produto.store')}}" method="POST" class="form-fornecedores">
    @csrf
@endif

        <select name="fornecedor_id">
            <option value="">Selecione o fornecedor</option>
            @foreach ($fornecedores as $fornecedor)
                <option value="{{$fornecedor->id}}" 
                    {{ (isset($produto->fornecedor_id) && $produto->fornecedor_id == $fornecedor->id) || (old('fornecedor_id') == $fornecedor->id) ? 'selected' : '' }}>
                    {{$fornecedor->nome}}
                </option>
            @endforeach
        </select>
        {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}

        <input type="text" value="{{$produto->nome ?? old('nome')}}" name="nome" placeholder="Nome">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}

        <input type="text" value="{{$produto->descricao ?? old('descricao')}}" name="descricao" placeholder="Descricao">
        {{$errors->has('descricao') ? $errors->first('descricao') : ''}}

        <input type="text" value="{{$produto->peso ?? old('peso')}}" name="peso" placeholder="Peso">
        {{$errors->has('peso') ? $errors->first('peso') : ''}}

        <select name="unidade_id">
                <option value="">Selecione uma unidade de medida</option>
            @foreach ($unidade as $value)
                <option value="{{$value->id}}" {{($produto->unidade_id ?? old('unidade_id')) == $value->id ? 'selected' : ''}}>{{$value->descricao}}</option>
            @endforeach
        </select>
        {{$errors->has('unidade_id')?$errors->first('unidade_id'):''}}

        @if (isset($produto->id))
        <button type="submit">Atualizar</button>
        @else
            <button type="submit">Cadastrar</button>
        @endif

    </form>
