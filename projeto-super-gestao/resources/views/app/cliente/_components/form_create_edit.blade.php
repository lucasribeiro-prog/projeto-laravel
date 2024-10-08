@if (isset($cliente->id))
    <form action="{{route('produto.update', ['produto' => $cliente->id])}}" method="POST" class="form-fornecedores">
        @csrf
        @method('PUT')   
@else
    <form action="{{route('cliente.store')}}" method="POST" class="form-fornecedores">
    @csrf
@endif

        <input type="text" value="{{$cliente->nome ?? old('nome')}}" name="nome" placeholder="Nome">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}

        @if (isset($cliente->id))
        <button type="submit">Atualizar</button>
        @else
            <button type="submit">Cadastrar</button>
        @endif

    </form>
