<div class="contato-principal">
    {{ $slot }}
    <form action="{{ route('site.contato') }}" method="POST" class="{{$form}}">
        @csrf
        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$class}}">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <br>
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$class}}">
        {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
        <br>
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$class}}">
        {{$errors->has('email') ? $errors->first('email') : ''}}
        <br>
        <select name="motivo_contato_id" class="{{$class}}">
            <option value="">Qual o motivo do contato?</option>
            @foreach($motivo_contato as $key => $motivo_contato)
                
                    <option value="{{$motivo_contato->id}}" {{old('motivo_contato_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
               
            @endforeach
        </select>
        {{$errors->has('motivo_contato_id') ? $errors->first('motivo_contato_id') : ''}}
        <br>
        <textarea name="mensagem" class="{{$class}}">
        @if( old('mensagem') != '')
            {{ old('mensagem') }}
        @else
            Preencha aqui a sua mensagem
        @endif
        
        </textarea>
        {{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}
        <br>

        @if($errors->any())
            <pre>
            {{print_r($errors->all())}}
            </pre>
        @endif
        <button type="submit" class="{{$class}}">ENVIAR</button>
    </form>
</div>