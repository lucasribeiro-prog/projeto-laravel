@extends('app.layouts.basico')
@section('titulo', 'Cliente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            <h1>Clientes</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('cliente.create')}}">Novo</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina2">
            <table class="tabela-fornecedores">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($cliente as $value)
                        <tr>
                            <td>{{$value->nome}}</td>
                            <td><a href="">Visualizar</a></td>
                            <td>
                                <form id="form_{{$value->id}}" action="{{route('cliente.destroy', ['cliente' => $value->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$value->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route('cliente.edit', ['cliente' => $value->id])}}">Editar</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>  
    </div>
@endsection