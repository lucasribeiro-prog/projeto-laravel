@extends('app.layouts.basico')
@section('titulo', 'Produto Detalhe')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">

            <h1>Editar Detalhes do Produto</h1>

        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidade' => $unidade])
                
            @endcomponent
        </div>  
    </div>
@endsection