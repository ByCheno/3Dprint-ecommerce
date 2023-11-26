@extends('adminlte::page')

@section('title', 'Listado de Imágenes')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listado de Imágenes: {{ $producto->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/admin/productos">Productos</a></li>
                    <li class="breadcrumb-item active">Imágenes {{ $producto->name }}</li>
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

        @if (session('error'))
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-info-circle"></i> {{ session('error') }}
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
                                <h5><i class="fa fa-image"></i> Imágenes Producto</h5>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#modalImagenes">
                                    Añadir Imagen
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-lg-2">
                                    @if ($image->tipo == 'galeria')
                                        <div class="card">
                                        @else
                                            <div class="card" style="border: 1px solid red !important;">
                                    @endif
                                    <img src="{{ asset('images/productos/' . $image->url) }}" class="card-img-top">
                                    <div class="card-body">
                                        <p class="card-text"></p>

                                        <a href="#" onclick="mostrarEliminar({{ $image->id }})"
                                            class="btn btn-danger float-right"><i class="fa fa-trash"></i></a>

                                        @if ($image->tipo == 'galeria')
                                            <a href="/admin/productos/fotoportada/{{ $image->id }}"
                                                class="btn btn-success float-right mr-2"><i class="fa fa-image"></i></a>
                                        @endif
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="modalImagenes" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalImagenesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImagenesLabel"><i class="fa fa-image"></i> Añadir Imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/productos/imagenes/crear/{{ $producto->id }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <label for="validacionTipo">Tipo Imagen: </label>
                            <select name="tipo" class="form-control" id="validacionTipo" required>
                                @if ($images->where('tipo', 'portada')->count() == 0)
                                    <option value="portada">Portada</option>
                                @endif
                                <option value="galeria">Galería</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validacionFile">Imágenes a subir: </label>
                            <input type="file" name="images[]" multiple class="form-control" id="validacionFile"
                                required>
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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarEliminar(id) {
            Swal.fire({
                title: "Eliminar imagen?",
                text: "Estás seguro que deseas eliminar la imiagen con ID: " + id + " ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/admin/productos/imagenes/eliminar/" + id;
                }
            });
        }
    </script>
@endsection
