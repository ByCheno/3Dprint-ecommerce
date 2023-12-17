<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @yield('titulo')
    @include('frontend.comunes.css')
    @vite('resources/js/app.js') 
</head>

<body>
    @include('frontend.comunes.menu')

    @yield('contenido')

    @include('frontend.comunes.js')

    @yield('js')
</body>
@include('frontend.comunes.footer')
</html>
