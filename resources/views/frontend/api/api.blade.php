@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs | Api</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    <section class="py-5">

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
                id="productos-container">



            </div>
        </div>
    </section>

    @include('frontend.componentes.productos_destacados')
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            fetch('http://127.0.0.1:8000/api/v1/productos')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('productos-container');
                    data.forEach(producto => {
                        console.log(producto);
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
