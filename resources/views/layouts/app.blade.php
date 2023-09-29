<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }} "> <!-- Custom stylesheet -->
</head>

<body>
    <div id="header">
        <!-- HEADER -->
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <div class="logo">
                        <a href="#"><img src="{{ asset('images/logoutu.png') }}"></a>
                    </div>
                </div>
                <div class="offset-md-2 col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hola {{ auth()->user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('change_password') }}">Cambiar contraseña</a>
                                <a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit()">Salir</a>
                            </div>
                            <form method="post" id="logoutForm" action="{{ route('logout') }}">
                                @csrf
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /HEADER -->

    <div id="menubar">
        <!-- Menu Bar -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Bootstrap Navbar -->
                    <nav class="navbar navbar-expand-md navbar-light bg-light">
                     

                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Principal</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('authors') }}">Autores</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('publishers') }}">Editoriales</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}">Categorías</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('books') }}">Libros</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('students') }}">Estudiantes</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('book_issued') }}">Préstamos</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('reports') }}">Reportes</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div> <!-- /Menu Bar -->

    @yield('content')

    <!-- FOOTER -->
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span> APLICACIÓN WEB SÓLO PARA USO INTERNO DE BIBLIOTECA </span>
                </div>
            </div>
        </div>
    </div>
    <!-- /FOOTER -->

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

