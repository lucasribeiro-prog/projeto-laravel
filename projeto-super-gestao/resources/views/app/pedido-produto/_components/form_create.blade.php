<form action="{{route('app.pedido-produto.store', ['pedido' => $pedido->id])}}" method="POST" class="form-fornecedores">
@csrf


    <select name="produto_id">
        <option value="">Selecione um produto</option>
        @foreach ($produto as $value)
            <option value="{{$value->id}}" 
                {{ old('produto_id') == $value->id ? 'selected' : '' }}>
                {{$value->nome}}
            </option>
        @endforeach
    </select>

    <button type="submit">Cadastrar</button>


</form>
