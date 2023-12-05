@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    @if(session('error'))
    <section class="py-5">
        <div class="container mt-1">
            <div class="alert alert-info">
                <h3>{{ session('error') }}</h3>
            </div>
        </div>
    </section>
    @endif

    @include('frontend.componentes.ultimos_productos')
    @include('frontend.componentes.productos_destacados')
@endsection