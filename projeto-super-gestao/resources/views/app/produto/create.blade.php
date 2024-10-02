@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">

            @if (isset($produto->id))
                <h1>Editar Produto</h1>
            @else
                <h1>Adicionar Produto</h1>
            @endif
            
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            @component('app.produto._components.form_create_edit', ['unidade' => $unidade])
                
            @endcomponent
        </div>  
    </div>
@endsection