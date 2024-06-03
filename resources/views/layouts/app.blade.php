<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1/2 Botella</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar custom-navbar border-bottom border-body navbar-expand-lg" >
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a class="navbar-brand d-flex align-items-center" href="#">
                  <img src="{{ asset('img/media-botella.png') }}" alt="Logo" width="65" height="55" class="d-inline-block align-text-top me-2">
                  1/2 BOTELLA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item ms-3">
                        <a class="nav-link" aria-current="page" href="/">INICIO</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="#">TIENDA</a>
                    </li>
                    <li class="nav-item ms-3">
                      <a class="nav-link" href="#">PROMOCIONES</a>
                    </li>
                    <li class="nav-item dropdown ms-3">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ADMINISTRAR
                      </a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/orden/list">ORDENES</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/compras/list">COMPRAS</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/producto/list">PRODUCTOS</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/categoria/list">CATEGORIAS</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/proveedor/list">PROVEEDORES</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/usuario/list">USUARIOS</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="/categoria/list">VENTAS</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
            <div class="d-flex ms-auto">
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
   
    @yield('content')
    
    <br><br>
    <footer class="page-footer font-small bg-light  fixed-bottom text-black mt-5" data-bs-theme="dark">
        <div class="footer-copyright text-center py-3">© 2024 Copyright  
            <span> 1/2 Botella S.A. de C.V. </span>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</html>