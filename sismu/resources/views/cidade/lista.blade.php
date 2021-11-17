@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de Cidades
                    <a href="{{ url('cidade/create') }}" class="btn btn-success btn-sm float-right">
                        Nova Cidade
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
                                <th>Nome</th>
                                <th>Estado</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cidades as $cidade)
                                <tr>
                                    <td>{{ $cidade->id }}</td>
                                    <td>{{ $cidade->nome }}</td>
                                    <td>{{ $cidade->uf }}</td>
                                    <td>
                                        <a href="{{url('cidade/'.$cidade->id) }}" class="btn btn-primary">
                                            Editar
                                        </a>
                                        {!! Form::open(['method'=>'DELETE', 'url'=>'cidade/'.$cidade->id, 'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $cidades->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
