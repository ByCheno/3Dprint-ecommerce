@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    <style>
        .bg-custom {
            background-color: rgba(255, 239, 230, 0.3);
        }
    </style>

    <section class="ftco-section mt-5 bg-custom">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row align-items-center">
                            <div class="col-lg-7 mb-5 mb-lg-0">
                                <h2 class="mb-5">Completa el formulario.</h2>
                               
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
                                
                                <form class="border-right pr-5 mb-5" method="post" action="/frontend/contacto/enviar" id="contactForm" name="contactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="name" id="fname"
                                                placeholder="Nombre de pila">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="surname" id="lname"
                                                placeholder="Apellido">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Correo electrónico">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="description" id="message" cols="30" rows="7"
                                                placeholder="Escribe tu mensaje"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="Enviar mensaje"
                                                class="btn btn-primary rounded-0 py-2 px-4">
                                            <span class="submitting"></span>
                                        </div>
                                    </div>
                                </form>
                                <div id="form-message-warning mt-4"></div>
                            </div>
                            <div class="col-lg-4 ml-auto">
                                <h3 class="mb-4">Hablemos de todo.</h3>
                                <p>Es importante para nosotros entender tus necesidades detalladamente. Por favor,
                                    descríbenos tu situación con claridad y proporciona toda la información posible para que
                                    podamos ofrecerte la mejor asistencia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
