<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\ConteudosController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutofotosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GuestController::class, 'index']);
Route::get('contato', [ContatosController::class, 'index']);
Route::post('contatos', [ContatosController::class, 'enviar']);
Route::get('sobre', [GuestController::class, 'sobre']);

// rotas admin
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('cidade', CidadesController::class);
Route::resource('categoria', CategoriasController::class);
Route::resource('cliente', ClientesController::class);
Route::resource('produto', ProdutosController::class);
Route::resource('venda', VendasController::class);
Route::resource('usuario', UsersController::class);
Route::resource('conteudo', ConteudosController::class);

Route::get('produtofoto/{id}', [ProdutofotosController::class, 'index']);
Route::get('produtofoto/{id}/create', [ProdutofotosController::class, 'create']);
Route::get('produtofoto/{id}/{produtofoto}', [ProdutofotosController::class, 'show'])->name('produtofoto.show');
Route::post('produtofoto/{id}', [ProdutofotosController::class, 'store']);
Route::patch('produtofoto/{id}/{produtofoto}', [ProdutofotosController::class, 'update']);
Route::delete('produtofoto/{id}/{produtofoto}', [ProdutofotosController::class, 'destroy']);
