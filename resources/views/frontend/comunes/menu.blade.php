<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img width="40" style="border-radius: 40px;" src="http://127.0.0.1:8000/vendor/adminlte/dist/img/infinitecs_logo2.png" />
            Infinitecs
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="{{ route('index') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.productos.tienda') }}">Productos</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.contacto') }}">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.aboutus') }}">Sobre nosotros</a></li>
                
            </ul>

            @if (!Auth::check())
                <a href="/login" class="btn btn-outline-info">
                    <i class="fa fa-user me-1"></i>
                    Login
                </a>
            @endif

            @if (Auth::check())
            <a class="btn btn-success mr-2" href="/frontend/miperfil"><i class="fa fa-user"></i> Bienvenido
                {{ Auth::user()->name }}!
            </a>

                <a class="btn btn-outline-dark mr-2" href="/frontend/carrito">
                    <i class="bi-cart-fill me-1"></i>
                    Cesta
                    <span id="num-productos" class="badge bg-dark text-white ms-1 rounded-pill">@if(session('carrito')){{ count(session('carrito')) }}@else 0 @endif</span>
                </a>

                <form id="logout-form" action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-outline-info" type="submit"> <i class="fas fa-sign-out-alt"></i> Salir
                    </button>
                </form>
            @endif

            </form>
        </div>
    </div>
</nav>
