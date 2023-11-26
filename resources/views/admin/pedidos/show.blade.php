@extends('adminlte::page')

@section('title', 'Detalle de Pedidos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalle del Pedido {{ $pedido->id }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/admin/pedidos">Pedidos</a></li>
                    <li class="breadcrumb-item active">Detalle Pedido {{ $pedido->id }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h5><i class="fa fa-cogs"></i> Pedidos BD: {{ $pedido->id }}</h5>
                            </div>
                            <div class="col-lg-3">
                                @if($pedido->estado == 'pendiente' && $detalles->count() > 0)
                                <a href="/admin/pedidos/completar/{{$pedido->id}}" class="btn btn-success float-right ml-1"><i class="fa fa-check"></i> Completar
                                    Pedido</a>
                                @endif
                                @if($pedido->estado == 'pendiente')
                                <a data-toggle="modal"
                                data-target="#modalDetallePedido" href="#" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Añadir Producto Pedido</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="pedidos" class="table table-striped tablaClase">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>ID Pedido</th>
                                            <th>Usuario</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($detalles as $detalle)

                                         @php
                                            $subtotal = App\Models\Producto::find($detalle->producto_id)->price * $detalle->cantidad;
                                            $total += $subtotal;
                                         @endphp
                                           
                                            <tr>
                                                <td>{{ $detalle->id }}</td>
                                                <td>{{ $pedido->id }}</td>
                                                <td>{{ App\Models\User::find($pedido->user_id)->name }}</td>
                                                <td>{{ App\Models\Producto::find($detalle->producto_id)->name }}</td>
                                                <td>{{ App\Models\Producto::find($detalle->producto_id)->price }}€</td>
                                                <td>{{ $detalle->cantidad }}</td>
                                                <td> {{ $subtotal }}€</td> 
                                            </tr>
                                        @endforeach
                                        <tr class="text-danger" style="font-size: 25px">
                                            <td><b>TOTAL</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{{$total}}€</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL ASIGNAR PEDIDO (DETALLE)-->
    <div class="modal fade" id="modalDetallePedido" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalDetallePedidoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetallePedidoLabel">Añadir Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/pedidos/asignar/{{$pedido->id}}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="col-md-12 mb-3">
                        <label for="validacionproducto">Producto: </label>
                        <select name="producto_id" class="form-control" id="validacionproducto" required>
                            <option value="">Selecciona un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->name }} ({{App\Models\Producto::stockActual($producto->id)}})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="validaciocantidad">Cantidad: </label>
                        <input type="number" name="cantidad" class="form-control" id="validaciocantidad" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link
        href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.7/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/datatables.min.css"
        rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.7/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/datatables.min.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $("#pedidos").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            /*dom: 'Bfrtip',*/
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ registros por páginas",
                "info": "Mostrando páginas _PAGE_ de _PAGES_ de _TOTAL_ registros",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first": "Primero",
                    "last": "Último"
                }
            }
        }).buttons().container().appendTo('#clientes_wrapper .col-md-6:eq(0)');

        function mostrarEliminar(id) {
            Swal.fire({
                title: "Eliminar Pedido?",
                text: "Estás seguro que deses elminar el pedido con ID: " + id,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/admin/pedidos/eliminar/" + id;
                }
            });
        }
    </script>
@endsection
