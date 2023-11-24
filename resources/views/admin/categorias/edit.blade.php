@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Categoría: {{ $categoria->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/admin/categorias">Categorías</a></li>
                    <li class="breadcrumb-item active">Editar Categoría: {{ $categoria->name }}</li>
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
                                <h5><i class="fa fa-cogs"></i> Editar Categoría</h5>
                            </div>
                            <div class="col-lg-3">
                                <a onclick="mostrarEliminar({{ $categoria->id }})"
                                                        title="Eliminar categoria" href="#" class="btn btn-danger float-right"><i
                                                            class="fa fa-trash"></i>  Eliminar Categoría</a>
                                   
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="/admin/categorias/update/{{ $categoria->id }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="col-md-12 mb-3">
                                            <label for="validacionCategoria">Nombre: </label>
                                            <input type="text" name="name" class="form-control"
                                                id="validacionCategoria" required value="{{$categoria->name}}">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="validacionDescripcion">Descripción: </label>
                                            <input type="text" name="description" class="form-control"
                                                id="validacionDescripcion" required value="{{$categoria->description}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/admin/categorias" class="btn btn-secondary">Volver Atrás</a>
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
                title: "Eliminar categoria?",
                text: "Estás seguro que deseas elminar la categoria con ID: " + id +
                    " Ten en cuenta que pueden existir productos asociados",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/admin/categorias/eliminar/" + id;
                }
            });
        }
    </script>
@endsection
