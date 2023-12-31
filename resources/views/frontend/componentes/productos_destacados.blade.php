<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Productos destacados</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach ($productos_destacados as $producto)
                    <div class="col mb-5">
                        <div class="card h-100">
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
                                    <!-- Product price-->
                                    {{ $producto->price }}€
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('frontend.productos.show', $producto->id) }}">Ver
                                        producto</a></div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</section>
