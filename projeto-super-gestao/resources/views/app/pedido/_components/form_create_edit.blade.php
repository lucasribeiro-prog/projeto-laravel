@if (isset($pedido->id))
    <form action="{{route('pedido.update', ['pedido' => $pedido->id])}}" method="POST" class="form-fornecedores">
        @csrf
        @method('PUT')   
@else
    <form action="{{route('pedido.store')}}" method="POST" class="form-fornecedores">
    @csrf
@endif

        <select name="cliente_id">
            <option value="">Selecione o cliente</option>
            @foreach ($cliente as $value)
                <option value="{{$value->id}}" 
                    {{ (isset($pedido->cliente_id) && $pedido->cliente_id == $value->id) || (old('cliente_id') == $value->id) ? 'selected' : '' }}>
                    {{$value->nome}}
                </option>
            @endforeach
        </select>

        @if (isset($cliente->id))
        <button type="submit">Atualizar</button>
        @else
            <button type="submit">Cadastrar</button>
        @endif

    </form>
