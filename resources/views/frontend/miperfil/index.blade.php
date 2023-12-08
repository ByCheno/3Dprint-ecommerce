@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs | Mi Pefil</title>
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
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill"
                                            href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                            aria-selected="true"><i class="fa fa-home"></i> Inicio</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                            href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                            aria-selected="false"><i class="fa fa-list"></i> Pedidos</a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                            href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                            aria-selected="false"><i class="fa fa-edit"></i> Cambiar Contraseña</a>
                                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                            href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                            aria-selected="false"><i class="fa fa-credit-card"></i> Añadir Tarjeta</a>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane active show text-left fade" id="vert-tabs-home" role="tabpanel"
                                            aria-labelledby="vert-tabs-home-tab">
                                            <div class="card card-widget widget-user">

                                                <div class="widget-user-header bg-info">
                                                    <h3 class="widget-user-username">Alexander Pierce</h3>
                                                    <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                                                </div>
                                                <div class="widget-user-image">
                                                    <img class="img-circle elevation-2" src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                                                        alt="User Avatar">
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-sm-4 border-right">
                                                            <div class="description-block">
                                                                <h5 class="description-header">3,200</h5>
                                                                <span class="description-text">SALES</span>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-4 border-right">
                                                            <div class="description-block">
                                                                <h5 class="description-header">13,000</h5>
                                                                <span class="description-text">FOLLOWERS</span>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="description-block">
                                                                <h5 class="description-header">35</h5>
                                                                <span class="description-text">PRODUCTS</span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                            aria-labelledby="vert-tabs-profile-tab">
                                            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris
                                            pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor
                                            sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus
                                            orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a
                                            luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus.
                                            Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc
                                            euismod pellentesque diam.
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                            aria-labelledby="vert-tabs-messages-tab">
                                            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
                                            Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget
                                            condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum
                                            orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna
                                            a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam
                                            vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet
                                            sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum,
                                            lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem
                                            eu risus tincidunt eleifend ac ornare magna.
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                            aria-labelledby="vert-tabs-settings-tab">
                                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis
                                            tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque
                                            tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum
                                            consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec
                                            pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam.
                                            Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst.
                                            Praesent imperdiet accumsan ex sit amet facilisis.
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
