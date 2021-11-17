<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\cidadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\usersController;
use App\Models\Produto;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cidade', cidadesController::class);
Route::resource('categoria', CategoriasControleer::class);
Route::resource('cliente', ClientesController::class);
Route::resource('produto', ProdutotosController::class);

Route::resource('usuario', usersControllerler::class);

Route::resource('historia', GuestController::class, 'sobre ');
Route::resource('historia', GuestController::class, 'cidadeClientes ');

