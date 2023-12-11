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
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane active show text-left fade" id="vert-tabs-home" role="tabpanel"
                                            aria-labelledby="vert-tabs-home-tab">
                                            <div class="card card-widget widget-user">

                                                <div class="widget-user-header bg-info text-center">
                                                    <h3 class="widget-user-username">{{ auth()->user()->name }}</h3>
                                                    <h5 class="widget-user-desc">{{ auth()->user()->email }}</h5>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row text-center">
                                                        <div class="col-sm-4 border-right">
                                                            <div class="description-block">
                                                                <h5 class="description-header">{{ count(auth()->user()->pedidos) }}</h5>
                                                                <span class="description-text">TOTAL PEDIDOS</span>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-4 border-right">
                                                            <div class="description-block">
                                                                <h5 class="description-header">{{ auth()->user()->totalProductosPorPedido() }}</h5>
                                                                <span class="description-text">TOTAL PRODUCTOS</span>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="description-block">
                                                                <h5 class="description-header">{{ auth()->user()->totalDineroGastadoCompras() }}€</h5>
                                                                <span class="description-text">DINERO GASTADO</span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                            aria-labelledby="vert-tabs-profile-tab">
                                            <h3>Listado de Pedidos</h3>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Fecha</th>
                                                            <th>Estado</th>
                                                            <th>Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @php
                                                            $pedidos = auth()
                                                                ->user()
                                                                ->pedidos()
                                                                ->orderBy('created_at', 'desc')
                                                                ->get();
                                                        @endphp

                                                        @foreach ($pedidos as $pedido)
                                                            <tr>
                                                                <td>{{ $pedido->id }}</td>
                                                                <td>{{ date('d-m-Y H:i:s', strtotime($pedido->fecha)) }}</td>
                                                                <td>
                                                                    @if ($pedido->estado == 'pendiente')
                                                                        <span class="badge badge-warning">Pendiente</span>
                                                                    @else
                                                                        <span class="badge badge-success">Completado</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a data-id="{{ $pedido->id }}" data-bs-toggle="modal"
                                                                        data-bs-target="#modalPedidoDetalle" href="#"
                                                                        class="btn btn-primary btn-sm boton-ver"><i
                                                                            class="fa fa-eye"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

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

    <div class="modal fade" id="modalPedidoDetalle" tabindex="-1" aria-labelledby="modalPedidoDetalleLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalPedidoDetalleLabel">Detalle del Pedido: <span
                            id="detallePedidoId"></span> </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tablaDetalles" class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Imagen</td>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="filasDetallePedido">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Total</td>
                                        <td id="totalPedido"></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.componentes.productos_destacados')
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('.boton-ver').click(function() {
                var id = $(this).attr('data-id');
                $('#detallePedidoId').html(id);
                $('#filasDetallePedido').html('');

                $.ajax({
                    url: "/frontend/miperfil/detallespedido/" + id,
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {

                        let detalles = JSON.parse(data);
                        let total = 0;
                        for (let i = 0; i < detalles.length; i++) {
                            
                            let subtotal = detalles[i].precio_producto * detalles[i].cantidad;
                            total += subtotal;
                            
                            let imagen = '<img src="/images/productos/' + detalles[i].foto_portada + '" width="50">';
                           
                            let fila = '<tr><td>'+imagen+'</td><td>' + detalles[i].nombre_producto + '</td><td>' +
                                detalles[i].precio_producto + '</td><td>' + detalles[i]
                                .cantidad + '</td><td>' + subtotal + '€</td></tr>';

                            $('#filasDetallePedido').append(fila);
                        }

                        $('#totalPedido').html(total.toFixed(2) + '€');
                    }
                });

                $('#modalPedidoDetalle').modal('show');
            });


        });
    </script>
@endsection
