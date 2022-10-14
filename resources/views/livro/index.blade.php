@extends('layout.app')
@section('title', 'Listagem de Livros')
@section('content')
    <h1>Listagem de Livros</h1>
    @if (Session::has('mensagem'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{Session::get('mensagem')}}
            </div>
        </div>    
    @endif
    <br>

    {{Form::open(['url' => 'biblioteca/buscar', 'method' => 'GET'])}}
    <div class="row">
        <div class="col-sm-3">
            <a href="{{url('biblioteca/create')}}" class="btn btn-outline-success">Criar</a>
        </div>
        <div class="col-sm-9">
            <div class="input-group m1-5">
                @if ($busca !== null)
                &nbsp;<a href="{{url('biblioteca/')}}" class="btn btn-outline-secondary">Lista</a>&nbsp;
                    
                @endif
                {{Form::text('busca', $busca, ['class' => 'form-control', 'required', 'placeholder' => 'buscar'] )}}
                &nbsp;
                <span class="input-group-btn">
                    {{Form::submit('Buscar', ['class' => 'btn btn-outline-primary'])}}
                </span>
            </div>
        </div>
    </div>
{{Form::close()}}
<br> <br>
<table class="table table-striped table-hover">
    @foreach ($livros as $livro)
    <tr>
        <td>
            <a href="{{url('biblioteca/'.$livro->id)}}">{{$livro->titulo}}</a>
        </td>
    </tr>
        
    @endforeach

</table>
    
@endsection