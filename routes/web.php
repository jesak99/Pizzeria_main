<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\PedidoController;

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

Route::get('/',[PizzaController::class,'indexP'], function () {
    return view('welcome');
});

//Route::get('/pizza/create',[PizzaController::class,'create']);
Route::resource('pizza',PizzaController::class)->middleware('auth.admin');
//Route::get('/user/create',[UserController::class,'create']);
Route::resource('user',UserController::class)->middleware('auth');
//Route::get('ordenar/{id}',[PizzaController::class,'ordenar']);
Route::resource('pedidos',PedidoController::class)->middleware('auth');
Route::get('pedidos/{tamanio}/{id}/edit',[PedidoController::class,'edit'])->middleware('auth');
Route::get('pedidos/orden/{id}',[PedidoController::class,'create'])->middleware('auth');
Route::get('ordenes',[PedidoController::class,'ordenes'])->middleware('auth');
Route::post('compra',[PedidoController::class,'compra'])->middleware('auth');
Route::post('editcomp',[PedidoController::class,'editcomp'])->middleware('auth');
Route::get('pedidos/{tamanio}/{id}/elim',[PedidoController::class,'elimcomp'])->middleware('auth');
Route::get('pedidos/{total}/pagar',[PedidoController::class,'pagar'])->middleware('auth');
Route::get('pedidos/{total}/store',[PedidoController::class,'store'])->middleware('auth');
Route::get('pedidos/{total}/detalles',[PedidoController::class,'detalles'])->middleware('auth');

Route::get('pedidos/{total}/aceptar',[PedidoController::class,'aceptar'])->middleware('auth');
Route::get('pedidos/{total}/rechazar',[PedidoController::class,'rechazar'])->middleware('auth');
Route::get('pedidos/{total}/entregar',[PedidoController::class,'entregar'])->middleware('auth');
Route::get('pedidos/{total}/preparada',[PedidoController::class,'preparada'])->middleware('auth');

//Route::resource('pedido',PedidoController::class)->middleware('auth');
Route::get('/admin',[AdminController::class,'index'])->middleware('auth.admin')->name('admin.index');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [PizzaController::class, 'indexP'])->name('home');

Route::group(['middleware'=>'auth.admin'], function () {
    Route::get('/index', [PizzaController::class, 'index'])->name('admin.index');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
