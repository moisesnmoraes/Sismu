@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Categorias
                    <a href="{{ url('categoria/create') }}" class="btn btn-success btn-sm float-right">
                        Nova Categoria
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
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Índice</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->descricao }}</td>
                                    <td>{{ $categoria->indice }}</td>
                                    <td>
                                        <a href="{{url('categoria/'.$categoria->id) }}" class="btn btn-primary">
                                            Editar
                                        </a>
                                        {!! Form::open(['method'=>'DELETE', 'url'=>'categoria/'.$categoria->id, 'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $categorias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
