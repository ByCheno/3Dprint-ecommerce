@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form action="{{ route('frontend.productos.filtrar_productos') }}" method="post">
            @csrf
            <div class="row">
                <h3 class="mb-3">Filtros de productos</h3>
                <div class="col-lg-3">
                    <select class="form-control" name="categoria_id" id="categorias">
                        <option value="">Selecccionar categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                    <input type="number" name="pmin" class="form-control" placeholder="Precio Mínimo">
                </div>
                <div class="col-lg-3">
                    <input type="number" name="pmax" class="form-control" placeholder="Precio Máximo">
                </div>
                <div class="col-lg-3">
                    <button class="btn w-100 btn-info flex-shrink-0" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Filtrar
                    </button>
                </div>
            </div>
        </form>
        </div>


        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($productos as $producto)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->                           
                            @if ($producto->fotoPortada() != null)
                                <img class="card-img-top"
                                    src="{{ asset('images/productos') . '/' . $producto->fotoPortada()['url'] }}"
                                    alt="..." />
                            @else
                                <img class="card-img-top" src=" {{ asset('images/cover.png') }} " alt="..." />
                            @endif
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $producto->name }}</h5>
                                    <h6><span class="badge badge-primary">{{App\Models\Categoria::find($producto->categoria_id)->name}}</span></h6>
                                    <!-- Product price-->
                                    {{ $producto->price }}€
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('frontend.productos.show', $producto->id) }}">Ver producto</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.componentes.productos_destacados')
@endsection
