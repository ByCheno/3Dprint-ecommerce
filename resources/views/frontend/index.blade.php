@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    <div id="app">
        <last-products></last-products>
     </div>

    @if(session('error'))
    <section class="py-5">
        <div class="container mt-1">
            <div class="alert alert-info">
                <h3>{{ session('error') }}</h3>
            </div>
        </div>
    </section>
    @endif

    @include('frontend.componentes.productos_destacados')
@endsection

@section('js')
    <script src="{{ mix('js/app.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            fetch('http://127.0.0.1:8000/api/v1/productos')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('productos-container');
                    data.forEach(producto => {
                        let imagen = "";
                        if(producto.foto_portada == null){
                            imagen = "/images/cover.png";
                        }else{
                            imagen = "/images/productos/"+producto.foto_portada.url;
                        }

                        const productHtml = `
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="${imagen}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">${producto.name}</h5>
                                    <!-- Product price-->
                                    ${producto.price}€
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/frontend/productos/show/${producto.id}">Ver producto</a></div>
                            </div>
                        </div>
                    </div>`;
                        container.innerHTML += productHtml;
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
