@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Categorias
                    <a href="{{ url('categoria') }}" class="btn btn-success btn-sm float-right">
                        Listar Categorias
                    </a>
                </div>
                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ Session::get('mensagem_sucesso') }}
                        </div>
                    @endif
                    @if(Route::is('categoria.show'))
                        {!! Form::model($categoria, ['method'=>'PATCH', 'url'=>'categoria/'.$categoria->id]) !!}
                    @else
                        {!! Form::open(['method'=>'POST', 'url'=>'categoria']) !!}
                    @endif
                    {!! Form::label('descricao', 'Descrição') !!}
                    {!! Form::input('text', 'descricao', null, ['class'=>'form-control',
                            'placeholder'=>'Descrição', 'required', 'maxlength'=>100, 'autofocus']) !!}
                    {!! Form::label('indice', 'Índice') !!}
                    {!! Form::input('text', 'indice', null, ['class'=>'form-control',
                            'placeholder'=>'Índice', 'required', 'maxlength'=>2]) !!}
                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
