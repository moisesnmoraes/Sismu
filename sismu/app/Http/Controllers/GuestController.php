<?php

namespace App\Http\Controllers;

use App\Models\Conteudo;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function sobre(){
        $conteudo = Conteudo::where('id', '=', 1)->first();
        return view('guest.sobre', compact('conteudo'));
    }

}
