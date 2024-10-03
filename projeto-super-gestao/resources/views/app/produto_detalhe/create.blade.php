@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">

            <h1>Adicionar Detalhes do Produto</h1>
            
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            @component('app.produto_detalhe._components.form_create_edit', ['unidade' => $unidade])
                
            @endcomponent
        </div>  
    </div>
@endsection