@extends('layout.app')
@section('title', 'Livro - {{$livro->titulo}}')
@section('content')
    <div class="p-3 mb-2 bg-dark text-white">
        <div class="card-header">
            <h1>Título: {{$livro->titulo}}</h1>
        </div>
        <div class="card-body">
            <p class="text">
                ID:{{$livro->id}} <br>
                Descrição:{{$livro->descricao}} <br>
                Autor:{{$livro->autor}} <br>
                Editora:{{$livro->editora}} <br>
                Ano:{{$livro->ano}} <br>
            </p>
        </div>
    </div>
    <div class="card-footer">
        {{Form::open(['route' => ['biblioteca.destroy', $livro->id], 'method' => 'DELETE'])}}
            <a href="{{url('biblioteca/'.$livro->id.'/edit')}}" class="btn btn-outline-info">Alterar</a>
            {{Form::submit('Excluir', ['class' => 'btn btn-outline-danger'])}}
            <a href="{{url('biblioteca/')}}" class="btn btn-outline-secondary">Voltar</a>
        {{Form::close()}}
    </div>
    
@endsection