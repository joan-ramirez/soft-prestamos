<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UsuarioController;

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

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/prestamos', [PrestamoController::class, 'index'])->name('index.prestamos');
Route::get('/crear-prestamo', [PrestamoController::class, 'create'])->name('create.prestamo');
Route::post('/guardar-prestamo', [PrestamoController::class, 'store'])->name('store.prestamo');


Route::get('/crear-cliente', [ClienteController::class, 'create'])->name('create.cliente');
Route::get('/clientes', [ClienteController::class, 'index'])->name('index.clientes');
Route::get('/buscar-cliente', [ClienteController::class, 'show'])->name('show.clientes');


Route::get('/usuarios', [UsuarioController::class, 'index'])->name('index.usuarios');
Route::get('/crear-usuario', [UsuarioController::class, 'create'])->name('create.usuario');

