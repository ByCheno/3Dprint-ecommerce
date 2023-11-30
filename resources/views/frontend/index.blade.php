@extends('frontend.layout')

@section('titulo')
    <title>Infinitecs</title>
@endsection

@section('contenido')
    @include('frontend.componentes.header')

    @include('frontend.componentes.ultimos_productos')
    @include('frontend.componentes.productos_destacados')
@endsection