<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');

    Route::get('/admin/productos', [ProductoController::class, 'index'])->name('admin.productos.index');

    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users.index');

    Route::get('/admin/pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::get('/admin/pedidos/eliminar/{id}', [PedidoController::class, 'destroy'])->name('admin.pedidos.destroy');

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
