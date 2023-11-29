<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @yield('titulo')
        @include('frontend.comunes.css')
    </head>
    <body>
        @include('frontend.comunes.menu')
        
        @yield('contenido')
      
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        @include('frontend.comunes.js')
     
    </body>
</html>
