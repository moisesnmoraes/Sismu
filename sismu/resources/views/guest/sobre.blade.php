@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-info text-center">
                {{ $conteudo->titulo }}
            </h3>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            {!! $conteudo->texto !!}
        </div>
    </div>
</div>
@endsection
