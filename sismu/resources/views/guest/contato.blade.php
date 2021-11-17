@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $conteudo->titulo }}</h2>
                    <p class="lead">
                        {!! $conteudo->texto !!}
                        <!--  -->
                    </p>
                    <hr />
                    <p class="lead">
                        Qual a sua duvida?
                    </p>
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    {!! Form::open(['method'=>'POST', 'url'=>'contatos']) !!}
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome') !!}
                        {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus',
                        'placeholder'=>'Nome', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::email('email', null, ['class'=>'form-control',
                        'placeholder'=>'E-mail', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fone', 'Telefone') !!}
                        {!! Form::input('text', 'fone', null, ['class'=>'form-control',
                        'placeholder'=>'Telefone']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('mensagem', 'Mensagem') !!}
                        {!! Form::textarea('mensagem', null, ['class'=>'form-control', 'required',
                        'placeholder'=>'Mensagem', 'rows'=>4]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Enviar', ['class'=>'form-control btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
