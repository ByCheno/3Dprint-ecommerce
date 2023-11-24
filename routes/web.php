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
    Route::get('/admin/categorias/eliminar/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');
    Route::get('/admin/categorias/ver/{id}', [CategoriaController::class, 'show'])->name('admin.categorias.show');
    Route::post('/admin/categorias/crear', [CategoriaController::class, 'crear'])->name('admin.categorias.create');
    Route::get('/admin/categorias/editar/{id}', [CategoriaController::class, 'editar'])->name('admin.categorias.edit');
    Route::post('/admin/categorias/update/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');

    Route::get('/admin/productos', [ProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/admin/productos/eliminar/{id}', [ProductoController::class, 'destroy'])->name('admin.productos.destroy');
    Route::get('/admin/productos/ver/{id}', [ProductoController::class, 'show'])->name('admin.productos.show');
    Route::post('/admin/productos/crear', [ProductoController::class, 'crear'])->name('admin.productos.create');
    Route::get('/admin/productos/imagenes/{id}', [ProductoController::class, 'images'])->name('admin.productos.images');
    Route::post('/admin/productos/imagenes/crear/{id}', [ProductoController::class, 'subirImagenes'])->name('admin.productos.subirImagenes');
    
    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users.index');
    
    Route::get('/admin/pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::get('/admin/pedidos/eliminar/{id}', [PedidoController::class, 'destroy'])->name('admin.pedidos.destroy');
    Route::get('/admin/pedidos/ver/{id}', [PedidoController::class, 'show'])->name('admin.pedidos.show');
    Route::get('/admin/pedidos/completar/{id}', [PedidoController::class, 'completar'])->name('admin.pedidos.completar');

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
