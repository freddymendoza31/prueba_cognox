<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransferirController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CuentasBancariasController;
use App\Http\Controllers\AgregarCtaBancariasController;



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
return view('home');
})->middleware('auth');



Route::get('/registro', [RegisterController::class, 'registro'])->name('registro.index');
Route::post('/registro', [RegisterController::class, 'create'])->name('create.index');
Route::get('/login', [LoginController::class, 'login'])->name('login.index');
Route::get('/alluser', [LoginController::class, 'allUser']);
Route::post('/login', [LoginController::class, 'loginsession'])->name('loginsession.index');
Route::get('/logout', [LoginController::class, 'destroy'])->name('destroy.index');
Route::post('/transferir', [TransferirController::class, 'transferir'])->name('transferir.index');
Route::get('/movimientosBco', [TransferirController::class, 'movimientosBco']);
Route::get('/consultProductos', [ProductoController::class, 'consultProductos']);
Route::post('/consultCuentas', [CuentasBancariasController::class, 'consultCuentas']);
Route::get('/cuentaOrigen', [CuentasBancariasController::class, 'cuentaOrigen']);
Route::post('/InscribirCta', [AgregarCtaBancariasController::class, 'createCtaBancarias']);



