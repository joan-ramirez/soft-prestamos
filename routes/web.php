<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CobroController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;

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
Route::post('/guardar-cliente', [ClienteController::class, 'store'])->name('store.cliente');
Route::get('/clientes/{query?}', [ClienteController::class, 'index'])->name('index.clientes');
Route::get('/buscar-cliente', [ClienteController::class, 'show'])->name('show.clientes');


Route::get('/usuarios/{query?}', [UsuarioController::class, 'index'])->name('index.usuarios');
Route::get('/crear-usuario', [UsuarioController::class, 'create'])->name('create.usuario');
Route::post('/guardar-usuario', [UsuarioController::class, 'store'])->name('store.usuario');

Route::get('/deudas', [DeudaController::class, 'index'])->name('index.deuda');

Route::get('/cobros', [CobroController::class, 'index'])->name('index.cobro');


Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('index.configuracion');
Route::put('/cambiar-password', [ConfiguracionController::class, 'cambiar_password'])->name('cambiar_password.configuracion');
