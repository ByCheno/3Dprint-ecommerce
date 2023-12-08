@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="{{ route('frontend.productos.tienda') }}"
                                            class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Volver a la
                                            Tienda</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Carrito de la compra</p>
                                            @if(session('carrito'))
                                            <p class="mb-0">Tienes {{ count(session('carrito')) }} productos en la cesta</p>
                                            @else
                                            <p class="mb-0">Tienes 0 productos en la cesta</p>
                                            @endif
                                        </div>
                                    </div>

                                    @php
                                        $subtotal = 0;
                                    @endphp

                                    @if(session('success'))
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="fa fa-info-circle"></i> {{ session('success') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if(session('carrito'))
                                        
                                        @foreach (session('carrito') as $id => $detalles)
                                        @php
                                            $producto = App\Models\Producto::find($id);
                                            $subtotal += $detalles['cantidad'] * $producto->price; 
                                        @endphp
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="{{ asset('images/productos') . '/' . $producto->fotoPortada()['url'] }}"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5>{{ $producto->name }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 50px;">
                                                            <h5 class="fw-normal mb-0">{{ $detalles['cantidad'] }}</h5>
                                                        </div>
                                                        <div style="width: 80px;">
                                                            <h5 class="mb-0">{{ $detalles['cantidad'] * $producto->price }}€</h5>
                                                        </div>
                                                        <a href="/frontend/carrito/producto/eliminar/{{$id}}" style="color: #cecece;"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           
                                        @endforeach
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="/frontend/carrito/eliminar" class="btn btn-danger float-end">
                                                <i class="fa fa-trash"></i> Vaciar Carrito
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5">

                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Detalle tarjeta</h5>
                                            </div>

                                            <p class="small mb-2">Tipo de pago</p>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-visa fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-amex fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-paypal fa-2x"></i></a>

                                            <form class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeName"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Tu nombre aquí" value="{{auth()->user()->name}}" />
                                                    <label class="form-label" for="typeName">Propietario de la tarjeta</label>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeText"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                                    <label class="form-label" for="typeText">Número de la tarjeta</label>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input type="text" id="typeExp"
                                                                class="form-control form-control-lg" placeholder="MM/YYYY"
                                                                size="7" id="exp" minlength="7"
                                                                maxlength="7" />
                                                            <label class="form-label" for="typeExp">Fecha expiración</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <input type="password" id="typeText"
                                                                class="form-control form-control-lg"
                                                                placeholder="&#9679;&#9679;&#9679;" size="1"
                                                                minlength="3" maxlength="3" />
                                                            <label class="form-label" for="typeText">Cvv</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <hr class="my-4">

                                            @if(session('carrito'))
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Subtotal</p>
                                                    <p class="mb-2">{{ $subtotal }}€</p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Envío</p>
                                                    @php
                                                        $precio_envio = 20;
                                                    @endphp
                                                    <p class="mb-2">{{$precio_envio}}€</p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <p class="mb-2">Total (21% IVA)</p>
                                                    <p class="mb-2">
                                                        @php
                                                            $total = ($subtotal + $precio_envio) + ($subtotal * 0.21);
                                                        @endphp
                                                        {{ round($total,2) }}€
                                                    </p>
                                                </div>

                                                <form action="/frontend/carrito/procesar" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-info btn-block btn-lg">
                                                        <div class="d-flex justify-content-between">
                                                            <span> {{ round($total,2) }}€</span>
                                                            <span>Realizar pedido <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                        </div>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.componentes.productos_destacados')
@endsection
