@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Cidades
                    <a href="{{ url('cidade') }}" class="btn btn-success btn-sm float-right">
                        Listar Cidades
                    </a>
                </div>
                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ Session::get('mensagem_sucesso') }}
                        </div>
                    @endif
                    @if(Route::is('cidade.show'))
                        {!! Form::model($cidade, ['method'=>'PATCH', 'url'=>'cidade/'.$cidade->id]) !!}
                    @else
                        {!! Form::open(['method'=>'POST', 'url'=>'cidade']) !!}
                    @endif
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::input('text', 'nome', null, ['class'=>'form-control',
                            'placeholder'=>'Nome', 'required', 'maxlength'=>100, 'autofocus']) !!}
                    {!! Form::label('uf', 'Estado') !!}
                    {!! Form::input('text', 'uf', null, ['class'=>'form-control',
                            'placeholder'=>'Estado', 'required', 'maxlength'=>2]) !!}
                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
