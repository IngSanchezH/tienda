<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
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

//Route::get('/', function () {    return view('index');});
Route::get('/', [HomeController::class, 'index'])-> name('index');


Route::resource('/admin/home', AdministradorController::class);
Route::resource('/admin/clientes', ClienteController::class);
Route::resource('/admin/ventas', VentaController::class);
Route::resource('/admin/productos', ProductoController::class);

Route::resource('/tienda/envios', HomeController::class);
Route::get('/tienda/mapa', [HomeController::class, 'mapa'])-> name('pages.mapa');

Route::post('/tienda/direccion', [HomeController::class, 'direccion'])-> name('tienda.direccion');

Route::get('/mapa', [HomeController::class, 'maps']) ->name('mapa');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

