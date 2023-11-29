@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Usuario: {{ $user->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/admin/usuarios">Usuarios</a></li>
                    <li class="breadcrumb-item active">Editar Usuario: {{ $user->name }}</li>
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
                                <h5><i class="fa fa-cogs"></i> Editar Usuario</h5>
                            </div>
                            <div class="col-lg-3">
                                <a onclick="mostrarEliminar({{ $user->id }})"
                                                        title="Eliminar usuario" href="#" class="btn btn-danger float-right">
                                                        <i class="fa fa-trash"></i>  Eliminar usuario</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="/admin/usuarios/update/{{ $user->id }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="col-md-12 mb-3">
                                            <label for="validacionNombre">Nombre: </label>
                                            <input type="text" name="name" class="form-control"
                                                id="validacionNombre" required value="{{$user->name}}">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validacionEmail">Email: </label>
                                            <input type="text" name="email" class="form-control"
                                                id="validacionEmail" required value="{{$user->email}}">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validacionPassword">Contraseña: </label>
                                            <input type="text" name="password" class="form-control"
                                                id="validacionPassword" required value="{{$user->password}}">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validacionRol">Rol: </label>
                                            <select name="user_type" id="validacionRol" class="form-control">
                                                <option value="admin" @if($user->user_type == 'admin') selected @endif>Administrador</option>
                                                <option value="user" @if($user->user_type == 'user') selected @endif>Usuario</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/admin/usuarios" class="btn btn-secondary">Volver Atrás</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarEliminar(id) {
            Swal.fire({
                title: "Eliminar usuario?",
                text: "Estás seguro que deseas elminar el usuario con ID: " + id +
                    " Ten en cuenta que pueden existir pedidos asociados",
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
