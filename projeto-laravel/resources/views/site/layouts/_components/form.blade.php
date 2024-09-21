<div class="contato-principal">
    {{ $slot }}
    <form action="{{ route('site.contato') }}" method="POST" class="{{$form}}">
        @csrf
        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$class}}">
        <br>
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$class}}">
        <br>
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$class}}">
        <br>
        <select name="motivo_contato" class="{{$class}}">
            <option value="">Qual o motivo do contato?</option>
            @foreach($motivo_contato as $key => $motivo_contato)
                
                    <option value="{{$motivo_contato->id}}" {{old('motivo_contato') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
               
            @endforeach
        </select>
        <br>
        <textarea name="mensagem" class="{{$class}}">
        @if( old('mensagem') != '')
            {{ old('mensagem') }}
        @else
            Preencha aqui a sua mensagem
        @endif
        
        </textarea>
        <br>
        @if ($errors->any())
            <p style="color:red;">Todos os campos devem ser preenchidos</p>
        @elseif(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif
        <button type="submit" class="{{$class}}">ENVIAR</button>
    </form>
</div>