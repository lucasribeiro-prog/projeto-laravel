@if (isset($produto_detalhe->id))
    <form action="{{route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id])}}" method="POST" class="form-fornecedores">
    @csrf
    @method('PUT')   
@else
    <form action="{{route('produto-detalhe.store')}}" method="POST" class="form-fornecedores">
@csrf
@endif

        <input type="text" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" name="produto_id" placeholder="ID do produto">
        {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}

        <input type="text" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" name="comprimento" placeholder="Comprimento">
        {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}

        <input type="text" value="{{$produto_detalhe->largura ?? old('largura')}}" name="largura" placeholder="Largura">
        {{$errors->has('largura') ? $errors->first('largura') : ''}}

        <input type="text" value="{{$produto_detalhe->altura ?? old('altura')}}" name="altura" placeholder="Altura">
        {{$errors->has('altura') ? $errors->first('altura') : ''}}

        <select name="unidade_id">
                <option value="">Selecione uma unidade de medida</option>
            @foreach ($unidade as $value)
                <option value="{{$value->id}}" {{($produto_detalhe->unidade_id ?? old('unidade_id')) == $value->id ? 'selected' : ''}}>{{$value->descricao}}</option>
            @endforeach
        </select>
        {{$errors->has('unidade_id')?$errors->first('unidade_id'):''}}

        @if (isset($produto_detalhe->id))
        <button type="submit">Atualizar</button>
        @else
            <button type="submit">Adicionar</button>
        @endif

    </form>
