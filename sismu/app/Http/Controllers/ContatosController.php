<?php

namespace App\Http\Controllers;

use App\Models\Conteudo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContatosController extends Controller
{
    public function index(){
        $conteudo = Conteudo::where('id', '=', 2)->first();
        return view('guest.contato', compact('conteudo'));
    }

    public function enviar(Request $request){
        $dest_nome = "Ariel";
        $dest_email = "arielguareschi@gmail.com";
        $dados = array('nome'=>$request['nome'],
                       'email'=>$request['email'],
                        'fone'=>$request['fone'],
                        'mensagem'=>$request['mensagem']);

        Mail::send('emails.contato', $dados,
            function($mensagem) use ($dest_nome, $dest_email, $request){
                $mensagem->to($dest_email, $dest_nome)
                        ->subject('E-mail do site famper!')
                        ->bcc(['arielguareschi@gmail.com', 'ariel@aerosystem.com.br']);
                $mensagem->from($request['email'], $request['nome']);
                $mensagem->attach(public_path('/').'/uploads/produtos/teste.jpg');
            }
        );
        $request->session()->flash('mensagem_sucesso', 'E-mail enviado com sucesso!');
        return Redirect::to('contato');
    }

}
