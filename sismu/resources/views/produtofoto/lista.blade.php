@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de fotos de produto
                    <a href="{{ url('produtofoto/'.$id.'/create') }}"
                        class="btn btn-success btn-sm float-right">
                        Nova foto
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
                                <th>Legenda</th>
                                <th>Foto</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fotos as $foto)
                                <tr>
                                    <td>{{ $foto->id }}</td>
                                    <td>{{ $foto->legenda }}</td>
                                    <td>{{ $foto->arquivo }}</td>
                                    <td>
                                        <a href="{{ url('produtofoto/'.$foto->produto_id.'/'.$foto->id) }}" class="btn btn-primary btn-sm">
                                            Editar
                                        </a>
                                        {!! Form::open(['method'=>'DELETE',
                                                        'url'=>'produtofoto/'.$foto->produto_id.'/'.$foto->id,
                                                        'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $fotos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
