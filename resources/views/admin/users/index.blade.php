@extends('adminlte::page')

@section('title', 'Listado de Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listado de Usuarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="container-fluid">

        @if (session('success'))
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
                                <h5><i class="fa fa-cogs"></i> Usuarios BD</h5>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#modalUsuario">
                                    Añadir Usuario
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="users" class="table table-striped tablaClase">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Rol</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                @if($user->user_type == 'admin')
                                                <td><span class="badge badge-warning">{{$user->user_type}}</span></td>
                                                @else
                                                <td><span class="badge badge-info">{{$user->user_type}}</span></td>
                                                @endif
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>      
                                                <td>
                                                    <a title="Ver user" href="/admin/usuarios/ver/{{ $user->id }}" class="btn btn-info"><i
                                                            class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a title="Editar user" href="/admin/usuarios/editar/{{ $user->id }}" class="btn btn-success"><i
                                                            class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                    <a onclick="mostrarEliminar({{ $user->id }})"
                                                        title="Eliminar user" href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;                                                    
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

    {{-- MODAL PARA AGREGAR USUARIOS --}}
    <div class="modal fade" id="modalUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUsuarioLabel">Añadir Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/usuarios/crear" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <label for="validacionCategoria">Nombre: </label>
                            <input type="text" name="name" class="form-control" id="validacionCategoria" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validacionEmail">Email: </label>
                            <input type="text" name="email" class="form-control" id="validacionEmail" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validacionPassword">Contraseña: </label>
                            <input type="text" name="password" class="form-control" id="validacionPassword" required>
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
        $("#users").DataTable({
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
                title: "Eliminar usuario?",
                text: "Estás seguro que deseas elminar el usuario con ID: " + id +
                    " Ten en cuenta que puede tener pedidos asociados",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/admin/usuarios/eliminar/" + id;
                }
            });
        }

    </script>
@endsection
