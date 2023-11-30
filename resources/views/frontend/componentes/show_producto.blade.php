@extends('frontend.layout')

@section('titulo')
    <title>Detalle producto</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    @if ($producto_detalle->fotoPortada() != null)
                        <img class="card-img-top" src="{{ asset('images/productos') . '/' . $producto_detalle->fotoPortada()['url'] }}"
                            alt="..." />
                    @else
                        <img class="card-img-top" src=" {{ asset('images/cover.png') }} " alt="..." />
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="bg mb-2">ID PRODUCTO: {{ $producto_detalle->id }}</div>
                    <h1 class="display-5 fw-bolder">{{ $producto_detalle->name }}</h1>
                    <div class="fs-5 mb-5">
                        <span class="badge badge-danger">Antes: {{ round($producto_detalle->price * 1.42,2)}}€</span>
                        <br>
                        <span class="badge badge-success">Ahora: {{ round($producto_detalle->price,2) }}€</span>
                        <br>
                        <span class="badge badge-warning">DESCUENTO DEL:  {{ round((($producto_detalle->price * 1.42) - $producto_detalle->price) / ($producto_detalle->price * 1.40) * 100,2) }}% !!!</span>
                    </div>
                    <p class="lead">{{ $producto_detalle->description }}</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                            style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                                Añadir al carrito
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
return view('frontend.productos_destacados', ['stock' => $stock]);
?>
@endsection
