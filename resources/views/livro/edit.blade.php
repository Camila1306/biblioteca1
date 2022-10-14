@extends('layout.app')
@section('title', 'Alteração Livro {{$livro->titulo}}')
@section('content')
    <h1>Alteração Livro {{$livro->titulo}}</h1><br>
    @if (count($errors)>0)
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
                
            @endforeach
          </ul>
        </div>
      </div>
        
    @endif
    @if (Session::has('mensagem'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{Session::get('mensagem')}}
            </div>
        </div>
        
    @endif
    {{Form::open(['route'=>['biblioteca.update', $livro->id], 'method' => 'PUT'])}}
        {{Form::label('titulo', 'Título')}}
        {{Form::text('titulo', $livro->titulo, ['class' => 'form-control', 'required', 'placeholder' => 'Título do Livro'])}}
        {{Form::label('descricao', 'Descrição')}}
        {{Form::text('descricao', $livro->descricao, ['class' => 'form-control', 'required', 'placeholder' => 'Descrição do Livro'])}}
        {{Form::label('autor', 'Autor')}}
        {{Form::text('autor', $livro->autor, ['class' => 'form-control', 'required', 'placeholder' => 'Nome do Autor'])}}
        {{Form::label('editora', 'Editora')}}
        {{Form::text('editora', $livro->editora, ['class' => 'form-control', 'required', 'placeholder' => 'Nome da Editora'])}}
        {{Form::label('ano', 'Ano')}}
        {{Form::text('ano', $livro->ano, ['class' => 'form-control', 'required', 'placeholder' => 'Exemplo: 2022', 'pattern' => '[0-9]{4}'])}}
        <br>
        {{Form::submit('Salvar', ['class' => 'btn btn-outline-success'])}}
        {{Form::button('Cancelar', ['onclick' => 'javascript:history.go(-1)', 'class' => 'btn btn-outline-danger'])}}
        <a href="{{url('biblioteca/')}}" class="btn btn-outline-secondary">Voltar</a>&nbsp;
    {{Form::close()}}
    
@endsection