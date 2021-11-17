<?php

namespace App\Http\Controllers;

use App\Models\Conteudo;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ConteudosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conteudos = Conteudo::sortable()->paginate(20);
        Paginator::useBootstrap();
        return view('conteudo.lista', compact('conteudos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conteudo.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conteudo = new Conteudo($request->all());
        $conteudo->save();
        $request->session()->flash('mensagem_sucesso', 'Conteudo salvo com sucesso!');
        return Redirect::to('conteudo/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function show(Conteudo $conteudo)
    {
        $conteudo = Conteudo::find($conteudo)->first();
        return view('conteudo.formulario', compact('conteudo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function edit(Conteudo $conteudo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conteudo $conteudo)
    {
        $conteudo = Conteudo::find($conteudo)->first();
        $conteudo->fill($request->all());
        $conteudo->save();
        $request->session()->flash('mensagem_sucesso', 'Conteudo alterado com sucesso!');
        return Redirect::to('conteudo/'.$conteudo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conteudo  $conteudo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Conteudo $conteudo)
    {
        $conteudo = Conteudo::find($conteudo)->first();
        $conteudo->delete();
        $request->session()->flash('mensagem_sucesso', 'Conteudo removido com sucesso!');
        return Redirect::to('conteudo');
    }


}
