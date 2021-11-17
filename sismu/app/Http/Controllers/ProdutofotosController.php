<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Produto;
use App\Models\Produtofoto;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ProdutofotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $fotos = Produtofoto::where('produto_id', '=', $id)->paginate(25);
        Paginator::useBootstrap();
        return view('produtofoto.lista', compact('id', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $produto = Produto::find($id)->first();
        return view('produtofoto.formulario', compact('produto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/produtos');
        if ($request->hasFile('foto')){
            $foto = $request->file('foto');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
            if (!$miniatura->resize(500,500, function($constraint){
                    $constraint->aspectRatio();
                })->save($pasta.'/'.$nomeArquivo)){
                $nomeArquivo = "semfoto.jpg";
            }
        } else {
            $nomeArquivo = 'semfoto.jpg';
        }
        $foto = new Produtofoto();
        $foto->fill($request->all());
        $foto->arquivo = $nomeArquivo;
        $foto->produto_id = $id;
        $foto->save();
        $request->session()->flash('mensagem_sucesso', 'Foto salva com sucesso!');
        return Redirect::to('produtofoto/'.$id.'/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtofoto  $produtofoto
     * @return \Illuminate\Http\Response
     */
    public function show($id, Produtofoto $produtofoto)
    {
        $produto = Produto::find($id);
        $foto = Produtofoto::find($produtofoto->id);
        return view('produtofoto.formulario', compact('produto', 'foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtofoto  $produtofoto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtofoto $produtofoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produtofoto  $produtofoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Produtofoto $produtofoto)
    {
        $foto = Produtofoto::find($produtofoto->id);
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/produtos');
        if ($request->hasFile('foto')){
            $foto = $request->file('foto');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
            if (!$miniatura->resize(500,500, function($constraint){
                    $constraint->aspectRatio();
                })->save($pasta.'/'.$nomeArquivo)){
                $nomeArquivo = "semfoto.jpg";
            }
        } else {
            $nomeArquivo = $foto->arquivo;
        }
        $foto = $foto->fill($request->all());
        $foto->arquivo = $nomeArquivo;
        $foto->produto_id = $id;
        $foto->save();
        $request->session()->flash('mensagem_sucesso', 'Foto alterada com sucesso!');
        return Redirect::to('produtofoto/'.$id.'/'.$foto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtofoto  $produtofoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, Produtofoto $produtofoto)
    {
        $foto = Produtofoto::find($produtofoto->id);
        $lOk = true;
        if (!empty($foto->arquivo)){
            if ($foto->arquivo != 'semfoto.jpg'){
                $lOk = unlink(public_path('uploads/produtos/').$foto->arquivo);
            }
        }
        if ($lOk){
            $foto->delete();
            $request->session()->flash('mensagem_sucesso', 'Foto removida com sucesso');
            return Redirect::to('produtofoto/'.$id);
        }
    }
}
