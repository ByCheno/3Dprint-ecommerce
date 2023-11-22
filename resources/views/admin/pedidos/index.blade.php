@extends('adminlte::page')

@section('title', 'Listado de Pedidos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listado de Pedidos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Pedidos</li>
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
                                <h5><i class="fa fa-cogs"></i> Pedidos BD</h5>
                            </div>
                            <div class="col-lg-3">
                                <a href="#" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Añadir
                                    Pedido</a>
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
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedidos as $pedido)
                                            <tr>
                                                <td>{{ $pedido->id }}</td>
                                                <td>{{ App\Models\User::find($pedido->user_id)->name }}</td>
                                                <td>{{ $pedido->fecha }}</td>
                                                <td>
                                                    <a title="Ver producto" href="#" class="btn btn-info"><i
                                                            class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a title="Editar producto" href="#" class="btn btn-success"><i
                                                            class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                    <a title="Eliminar producto" href="/admin/pedidos/eliminar/{{$pedido->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;                                                    
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
    </script>
@endsection
