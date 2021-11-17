@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cadastro de produtos
                    <a href="{{ url('produto') }}" class="btn btn-success btn-sm float-right">Listar Produtos</a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Route::is('produto.show'))
                        {!! Form::model($produto, ['method'=>'PATCH', 'url'=>'produto/'.$produto->id]) !!}
                    @else
                        {!! Form::open(['method'=> 'POST', 'url'=>'produto'])  !!}
                    @endif
                    {!! Form::label('descricao', 'Descrição') !!}
                    {!! Form::input('text', 'descricao', null, ['class'=>'form-control', 'autofocus',
                                    'placeholder'=>'Descrição', 'required']) !!}

                    {!! Form::label('preco', 'Preço') !!}
                    {!! Form::number('preco', null, ['class'=>'form-control', 'placeholder'=>'Preço',
                                     'required', 'step'=>0.01]) !!}

                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control',
                                     'placeholder'=>'Selecione a categoria', 'required']) !!}

                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
