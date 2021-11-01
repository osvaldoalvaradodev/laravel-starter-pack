<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel-Starter-Pack</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Mis Estilos -->
        <link href="{{url('/css/mystyle.css')}}" rel="stylesheet">
        <!-- Boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Axios -->
	    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">L<span class="d-none d-sm-inline">aravel </span>S<span class="d-none d-sm-inline">tarter </span>P<span class="d-none d-sm-inline">ack</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                        <li class="nav-item">
                            <a class="nav-link {{(request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">
                                <i class="material-icons">home</i> Inicio
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{(request()->is('config/*')) ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                            <i class="material-icons">settings</i> Configurar
                        </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item {{(request()->is('config/users')) ? 'active' : '' }}" href="{{ url('config/users') }}">Usuarios</a></li>
                                <li><a class="dropdown-item {{(request()->is('config/clients')) ? 'active' : '' }}" href="{{ url('config/clients') }}">Clientes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{(request()->is('sesion/*')) ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                            <i class="material-icons">manage_accounts</i> Cuenta
                        </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item {{(request()->is('sesion/changepassword')) ? 'active' : '' }}" href="{{ url('sesion/changepassword') }}">Cambiar Contraseña</a></li>
                                <li><a class="dropdown-item {{(request()->is('sesion/logout')) ? 'active' : '' }}" href="{{ url('sesion/logout') }}">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main">
            @yield('content')
        </div>
    </body>
</html>
