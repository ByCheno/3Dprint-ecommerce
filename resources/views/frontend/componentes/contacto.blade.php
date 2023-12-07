@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    <section class="ftco-section">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row align-items-center">
                            <div class="col-lg-7 mb-5 mb-lg-0">
                                <h2 class="mb-5">Completa el formulario.</h2>
                                <form class="border-right pr-5 mb-5" method="post" id="contactForm" name="contactForm">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="fname" id="fname"
                                                placeholder="Nombre de pila">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="lname" id="lname"
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
                                            <textarea class="form-control" name="message" id="message" cols="30" rows="7"
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
                                <p><a href="#">Leer más</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
