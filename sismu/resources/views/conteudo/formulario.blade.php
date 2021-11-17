@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Conteúdos
                    <a href="{{ url('conteudo') }}" class="btn btn-success btn-sm float-right">
                        Listar Conteúdos
                    </a>
                </div>
                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ Session::get('mensagem_sucesso') }}
                        </div>
                    @endif
                    @if(Route::is('conteudo.show'))
                        {!! Form::model($conteudo, ['method'=>'PATCH', 'url'=>'conteudo/'.$conteudo->id]) !!}
                    @else
                        {!! Form::open(['method'=>'POST', 'url'=>'conteudo']) !!}
                    @endif
                    {!! Form::label('titulo', 'Título') !!}
                    {!! Form::input('text', 'titulo', null, ['class'=>'form-control',
                            'placeholder'=>'Título', 'required', 'maxlength'=>100, 'autofocus']) !!}
                    {!! Form::label('texto', 'Texto') !!}
                    {!! Form::textarea('texto', null, ['class'=>'form-control ckeditor']) !!}
                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
