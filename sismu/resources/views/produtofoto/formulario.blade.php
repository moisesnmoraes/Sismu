@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cadastro de fotos de produtos - {{ $produto->descricao }}
                    <a href="{{ url('produtofoto/'.$produto->id) }}" class="btn btn-success btn-sm float-right">
                        Listar Fotos de Produtos
                    </a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Route::is('produtofoto.show'))
                        {!! Form::model($foto, ['method'=>'PATCH', 'url'=>'produtofoto/'.$produto->id.'/'.$foto->id]) !!}
                        <div class="text-center">
                            <img src="{{ url('/') }}/uploads/produtos/{{ $foto->arquivo }}"
                                alt="{{ $foto->legenda }}"
                                title="{{ $foto->legenda }}"
                                class="img-thumbnail" width="150" />
                        </div>
                    @else
                        {!! Form::open(['method'=> 'POST', 'url'=>'produtofoto/'.$produto->id, 'files'=>true])  !!}
                    @endif
                    {!! Form::label('legenda', 'Legenda') !!}
                    {!! Form::input('text', 'legenda', null, ['class'=>'form-control', 'autofocus',
                                    'placeholder'=>'Legenda', 'required']) !!}

                    {!! Form::label('foto', 'Foto') !!}
                    {!! Form::file('foto', ['class'=>'form-control btn-sm', 'required']) !!}

                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
