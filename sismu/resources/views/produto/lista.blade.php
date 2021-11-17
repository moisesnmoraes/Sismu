@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de produto
                    <a href="{{ url('produto/create') }}" class="btn btn-success btn-sm float-right">
                        Novo Produto
                    </a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Session::has('mensagem_aviso'))
                        <div class="alert alert-danger">{{ Session::get('mensagem_aviso') }}</div>
                    @endif
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->id }}</td>
                                    <td>{{ $produto->descricao }}</td>
                                    <td>{{ $produto->preco }}</td>
                                    <td>{{ $produto->categoria->descricao }}</td>
                                    <td>
                                        <a href="{{ url('produtofoto/'. $produto->id) }}" class="btn btn-secondary btn-sm">Fotos</a>
                                        <a href="{{ url('produto/'.$produto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        {!! Form::open(['method'=>'DELETE', 'url'=>'produto/'.$produto->id, 'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $produtos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
