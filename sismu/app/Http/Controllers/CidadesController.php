<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class CidadesController extends Controller
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
        $cidades = Cidade::paginate(25);
        //$cidades = Cidade::get();
        Paginator::useBootstrap();
        return view('cidade.lista', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cidade.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade();
        $cidade->fill($request->all());
        $cidade->save();
        $request->session()->flash('mensagem_sucesso', 'Cidade salva com sucesso!');
        return Redirect::to('cidade/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        return view('cidade.formulario', compact('cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        $cidade->fill($request->all());
        $cidade->save();
        $request->session()->flash('mensagem_sucesso', 'Cidade alterada com sucesso!');
        return Redirect::to('cidade/'.$cidade->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        $cidade->delete();
        $request->session()->flash('mensagem_sucesso', 'Cidade removida com sucesso!');
        return Redirect::to('cidade');
    }
}
