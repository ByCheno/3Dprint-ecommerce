@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')
    <!-- About 1 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                <div class="col-12 col-lg-6 col-xl-5">
                    <img class="img-fluid rounded" loading="lazy" src="{{ asset('images/infinitecs_fondo.png') }}" alt="Fondo impresion 3D">
                </div>
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="row justify-content-xl-center">
                        <div class="col-12 col-xl-11">
                            <h2 class="mb-3">¿Quiénes Somos?</h2>
                            <p class="lead fs-4 text-secondary mb-3">En Soluciones de Impresión 3D, revolucionamos la forma en que piensas sobre la fabricación y el prototipado. Con tecnología de impresión 3D de vanguardia, damos vida a tus ideas.</p>
                            <p class="mb-5">Nuestro viaje comenzó con una pasión por la innovación y se ha transformado en una misión para redefinir los estándares de la industria. Nos enfocamos en la precisión, eficiencia y personalización en cada proyecto que emprendemos.</p>
                            <div class="row gy-4 gy-md-0 gx-xxl-5X">
                                <div class="col-12 col-md-6">
                                    <div class="d-flex">
                                        <div class="me-4 text-primary">
                                            <i class="fas fa-cogs fa-2x"></i>
                                        </div>
                                        <div>
                                            <h2 class="h4 mb-3">Tecnología Avanzada</h2>
                                            <p class="text-secondary mb-0">Utilizando impresoras 3D y materiales de última generación, ofrecemos una calidad y flexibilidad de diseño sin igual para una amplia gama de industrias.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex">
                                        <div class="me-4 text-primary">
                                            <i class="fas fa-lightbulb fa-2x"></i>
                                        </div>
                                        <div>
                                            <h2 class="h4 mb-3">Soluciones Personalizadas</h2>
                                            <p class="text-secondary mb-0">Desde prototipos hasta la producción a gran escala, trabajamos en estrecha colaboración con nuestros clientes para crear soluciones a medida que satisfagan sus necesidades únicas.</p>
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
@endsection

