<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
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
        $usuarios = User::paginate(25);
        Paginator::useBootstrap();
        return view('usuario.lista', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.formulario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:8|max:15'
        ]);
        $user = new User();
        $user = $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        $request->session()->flash('mensagem_sucesso', 'Usuário cadastrado com sucesso');
        return Redirect::to('usuario/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.formulario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|string|min:8|max:15'
        ]);
        $user = User::findOrFail($id);
        $user->fill($request->all());
        if (empty($request->password)){
            $user->password = $request->original;
        } else{
            $user->password = bcrypt($request->password);
        }
        $user->update();
        $request->session()->flash('mensagem_sucesso', 'Usuário alterado com sucesso');
        return Redirect::to('usuario/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->id != $id){
            $user = User::findOrFail($id);
            $user->delete();
            $request->session()->flash('mensagem_sucesso', 'Usuário removido com sucesso');
            return Redirect::to('usuario');
        } else {
            $request->session()->flash('mensagem_aviso', 'Você não pode se excluir!');
            return Redirect::to('usuario');
        }
    }
}
