@extends('adminlte::page')

@section('title', 'Detalle de Productos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalle del Producto {{ $producto->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/admin/productos">Productos</a></li>
                    <li class="breadcrumb-item active">Detalle Producto: {{ $producto->id }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h5><i class="fa fa-cogs"></i> Productos BD: {{ $producto->id }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="productos" class="table table-striped tablaClase">
                                    <thead>
                                        <tr>
                                            <th>Id</th> 
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Categoria</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detalles as $detalle)
                                            <tr>
                                                <td>{{ $detalle->id }}</td>
                                                <td>{{ $detalle->name }}</td>
                                                <td>{{ $detalle->price }}€</td>
                                                <td><a href="/admin/categorias/ver/{{$detalle->categoria_id}}"> {{ App\Models\Categoria::find($detalle->categoria_id)->name }}<a></td>
                                                    <td>{{ $detalle->description }}€</td>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h5><i class="fa fa-cogs"></i> Stock Actual: <b>({{App\Models\Producto::stockActual($producto->id)}})</b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="stocks" class="table table-striped tablaClase">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Tipo</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stocks as $stocks)
                                            <tr>
                                                <td>{{ $stocks->id }}</td>
                                                <td>{{ $producto->name }}</td>
                                                <td>{{ $stocks->cantidad }}</td>
                                                <td>{{ ucfirst($stocks->tipo) }}</td>
                                                <td>{{ date("d-m-Y H:i:s",strtotime($stocks->fecha))}}</td>    
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
        $("#productos").DataTable({
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

        $("#stocks").DataTable({
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
