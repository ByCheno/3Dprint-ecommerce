@extends('adminlte::page')

@section('title', 'Listado de Productos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listado de Productos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="container-fluid">

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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h5><i class="fa fa-cogs"></i> Productos BD</h5>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#modalProducto">
                                    Añadir Producto
                                </button>
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
                                            <th>Categoría</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Stock Actual</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                            <tr>
                                                <td>{{ $producto->id }}</td>
                                                <td>{{ App\Models\Categoria::find($producto->categoria_id)->name }}</td>
                                                <td>{{ $producto->name }}</td>
                                                <td>{{ $producto->price }}€</td>      
                                                <td>
                                                    <a style="width: 100px" href="/admin/productos/stock/{{$producto->id}}" class="btn btn-primary">Stock ({{App\Models\Producto::stockActual($producto->id)}})</a>
                                                   </td>                                          
                                                <td>
                                                    <a title="Ver producto" href="/admin/productos/ver/{{$producto->id}}" class="btn btn-info"><i
                                                            class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a title="Editar producto" href="/admin/productos/editar/{{ $producto->id }}" class="btn btn-success"><i
                                                            class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                    <a onclick="mostrarEliminar({{$producto->id}})" title="Eliminar producto" href="#"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;

                                                    <a title="Imágenes producto" href="/admin/productos/imagenes/{{$producto->id}}" class="btn btn-dark"><i class="fa fa-image"></i></a>&nbsp;&nbsp;                                                    
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

    <div class="modal fade" id="modalProducto" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalProductoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProductoLabel">Añadir Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/productos/crear" method="post">
                    @csrf
                    <div class="modal-body">
                        
                        <div class="col-md-12 mb-3">
                            <label for="validacionCategoria">Categoría: </label>
                            <select name="categoria_id" class="form-control" id="validacionCategoria" required>
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validacionCategoria">Nombre: </label>
                            <input type="text" name="name" class="form-control" id="validacionCategoria" value="" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validacionDescripcion">Descripción: </label>
                            <input type="text" name="description" class="form-control" id="validacionDescripcion" value="" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validacionPrecio">Precio: </label>
                            <input type="text" name="price" class="form-control" id="validacionPrecio" value="" required>
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

    <div class="modal fade" id="modalStock" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalStockLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStockLabel">Modificar Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/productos/stock{{$producto->cantidad}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <label for="validacionStock">Cantidad: </label>
                            <input type="text" name="cantidad" class="form-control" id="validacionStock" value="{{ App\Models\Producto::stockActual($producto->id) }}" required>
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

        function mostrarEliminar(id) {
            Swal.fire({
                title: "Eliminar Producto?",
                text: "Estás seguro que deseas elminar el producto con ID: " + id + " Ten en cuenta que pueden existir pedidos asociados",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/admin/productos/eliminar/" + id;
                }
            });
        }
    </script>
@endsection
