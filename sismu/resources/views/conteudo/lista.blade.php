@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Conteúdos
                    <a href="{{ url('conteudo/create') }}" class="btn btn-success btn-sm float-right">
                        <i class="far fa-plus-square"></i> Novo Conteúdo
                    </a>
                </div>
                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{ Session::get('mensagem_sucesso') }}
                        </div>
                    @endif
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>@sortablelink('id')</th>
                                <th>@sortablelink('titulo')</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conteudos as $conteudo)
                                <tr>
                                    <td>{{ $conteudo->id }}</td>
                                    <td>{{ $conteudo->titulo }}</td>
                                    <td>
                                        <a href="{{url('conteudo/'.$conteudo->id) }}" class="btn btn-primary">
                                            Editar
                                        </a>
                                        {!! Form::open(['method'=>'DELETE', 'url'=>'conteudo/'.$conteudo->id, 'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $conteudos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
