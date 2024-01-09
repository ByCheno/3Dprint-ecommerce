@extends('adminlte::page')

@section('title', 'Dashboard Administración')

@section('content_header')
    <h1>Panel del Administrador</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        {{-- PANEL DE CATEGORIAS --}}
        <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ App\Models\Categoria::all()->count() }}</h3>
                    <p>Categorías</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cogs"></i>
                </div>
                <a href="/admin/categorias" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- PANEL DE PRODUCTOS --}}
        <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ App\Models\Producto::all()->count() }}</h3>
                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-list"></i>
                </div>
                <a href="/admin/productos" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- PANEL DE PEDIDOS --}}
        <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ App\Models\Pedido::all()->count() }}</h3>
                    <p>Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-cart-plus"></i>
                </div>
                <a href="/admin/pedidos" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- PANEL DE USUARIOS --}}
        <div class="col-lg-2 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ App\Models\User::all()->count() }}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="/admin/usuarios" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ App\Models\Contacto::all()->count() }}</h3>
                    <p>Mensajes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="/admin/contacto" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Resumen de compras y pedidos</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-success text-xl">
                            <i class="ion ion-ios-refresh-empty"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                            <span class="font-weight-bold">
                                <i class="ion ion-android-arrow-up text-success"></i>
                                {{ App\Models\Pedido::where('estado', 'pendiente')->count() }}
                            </span>
                            <span class="text-muted text-uppercase">Pedidos pendientes</span>
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-warning text-xl">
                            <i class="ion ion-ios-cart-outline"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                            <span class="font-weight-bold">
                                <i class="ion ion-android-arrow-up text-warning"></i>
                                {{ App\Models\Pedido::where('estado', 'completado')->count() }}
                            </span>
                            <span class="text-muted text-uppercase">Pedidos completados</span>
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-0">
                        <p class="text-danger text-xl">
                            <i class="ion ion-ios-people-outline"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                            <span class="font-weight-bold">
                                <i class="ion ion-android-arrow-down text-danger"></i> {{ $total }}€
                            </span>
                            <span class="text-muted text-uppercase">Ingresos totales</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
