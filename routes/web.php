<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CarritoController;
use App\Models\Producto;

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
    Route::get('/admin/productos/editar/{id}', [ProductoController::class, 'editar'])->name('admin.productos.edit');
    Route::post('/admin/productos/update/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::get('/admin/productos/stock/{id}', [ProductoController::class, 'verStock'])->name('admin.productos.stock');
    Route::post('/admin/productos/stock/update/{id}', [ProductoController::class, 'updateStock'])->name('admin.productos.crearStock');
    Route::get('/admin/productos/stock/eliminar/{id}', [ProductoController::class, 'eliminarStock'])->name('admin.productos.deleteStock');
    Route::get('/admin/productos/fotoportada/{id}', [ProductoController::class, 'actualizarFotoPortada'])->name('admin.productos.renamePhotoHome');
    Route::get('/admin/productos/imagenes/eliminar/{id}', [ProductoController::class, 'eliminarImagen'])->name('admin.productos.deleteImages');



    Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/usuarios/eliminar/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/usuarios/ver/{id}', [UserController::class, 'show'])->name('admin.usuarios.show');
    Route::post('/admin/usuarios/crear', [UserController::class, 'crear'])->name('admin.users.create');
    Route::get('/admin/usuarios/editar/{id}', [UserController::class, 'editar'])->name('admin.users.edit');
    Route::post('/admin/usuarios/update/{id}', [UserController::class, 'update'])->name('admin.users.update');


    Route::get('/admin/pedidos', [PedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::get('/admin/pedidos/eliminar/{id}', [PedidoController::class, 'destroy'])->name('admin.pedidos.destroy');
    Route::get('/admin/pedidos/ver/{id}', [PedidoController::class, 'show'])->name('admin.pedidos.show');
    Route::get('/admin/pedidos/completar/{id}', [PedidoController::class, 'completar'])->name('admin.pedidos.completar');
    Route::post('/admin/pedidos/crear', [PedidoController::class, 'crear'])->name('admin.pedidos.create');
    Route::post('/admin/pedidos/asignar/{id}', [PedidoController::class, 'asignarDetallePedido'])->name('admin.pedidos.asignarDetallePedido');


});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});



/* RUTAS FRONTED */
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('frontend/productos/show/{id}', [FrontendController::class, 'show'])->name('frontend.productos.show');
Route::get('frontend/productos/filtrado', [FrontendController::class, 'filtrado'])->name('frontend.productos.filtrado');
// Route::get('carrito/agregar/{id}', [CarritoController::class,'agregarCarrito'])->name('carrito.agregar');