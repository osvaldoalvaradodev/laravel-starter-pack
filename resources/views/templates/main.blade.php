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
        <style>
            body{
                font-family: 'Poppins', sans-serif;
                min-height: 100vh;
            }
            #scaffold{
                display:flex;
                flex-direction: row;
                min-height: calc(100vh - 54px);
            }
            #scaffold-body{
                flex-grow:1;
                overflow: overlay;
                display: block;
                min-height: 100%;
                max-height: 100%;
                width: 100%;
                padding-left:250px;
                color:black;
                transition: padding-left 0.8s;
            }
            
            #sidebar-toggle{
                display: none;
            }
            #sidebar-toggle i{
                transform: rotate(0deg);
                transition: transform .15s ease-in-out
            }
            #sidebar-toggle.active i{
                transform: rotate(180deg);
            }

            #sidebar{
                display: block;
                position:fixed;
                height: 100vh;
                width: 250px;
                float:left;
                left:0px;
                transition: left 0.8s;
                z-index: 30;
            }
            #sidebar-content{
                display: block;
                position:relative;
                height: 100vh;
                width: 250px;
                z-index: 40;
                overflow-y: overlay;
            }

            @media only screen and (max-width: 930px) {
                #scaffold-body{
                    padding-left:0px;
                }
                #sidebar{
                    left:-250px;
                    -webkit-box-shadow:none;
                    box-shadow:none
                }
                #sidebar.active{
                    left:0px;
                    -webkit-box-shadow: 35px 38px 23px -37px #000000;
                    box-shadow: 35px 38px 23px -37px #000000;
                    
                }
                #sidebar-toggle{
                    display: inline-block;
                }
            }
            
            .scroll-style{
                overflow-y:auto;
            }
            .scroll-style::-webkit-scrollbar {
                width: 6px;
            }
            .scroll-style::-webkit-scrollbar-track {
                width: 0px!important;
            }
            .scroll-style::-webkit-scrollbar-thumb {
                position: absolute;
                transform: translate(50px, 50px);
                background-color: rgba(0,0,0,0.2);
                border-radius: 6px;
                right:50px;
            }

            .menu-collapse{
                display: block;
                padding: 0.5rem 1rem;
                color: #e0e0e0;
                text-decoration: none;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
                cursor: pointer;
            }
            .menu-collapse:hover{
                color: #f5f5f5;
            }
            
            .menu-collapse.active{
                color: white;
            }
            .menu-link{
                display: block;
                padding: 0.5rem 1rem;
                color: #e0e0e0;
                text-decoration: none;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
                cursor: pointer;
            }
            
            .menu-link:hover{
                color: #f5f5f5;
            }
            
            .menu-link.active{
                color: white;
            }

            .menu-collapse::after{
                display: inline-block;
                margin-left: 0.255em;
                vertical-align: 0.255em;
                content: "";
                border-top: 0.3em solid;
                border-right: 0.3em solid transparent;
                border-bottom: 0;
                border-left: 0.3em solid transparent;
                transition: border-top .15s ease-in-out,border-bottom .15s ease-in-out
            }
            .menu-collapse.active::after{
                display: inline-block;
                margin-left: 0.255em;
                vertical-align: 0.255em;
                content: "";
                border-top: 0;
                border-right: 0.3em solid transparent;
                border-bottom: 0.3em solid;
                border-left: 0.3em solid transparent;
            }
            .menu-items{
                height: 0;
                transition: height 1s ease-in-out;
                overflow-y: hidden;
                padding-left: 10px;
                background: rgba(0,0,0,0.2)
            }            
            .menu-collapse.active + .menu-items{
                height: auto;
            }

            #notificaciones::after{
                display: none;
            }

        </style>
    </head>
    <body class="bg-dark">
        <nav class="navbar text-white">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand text-white" href="{{ url('/') }}" align="center">L<span class="d-none d-sm-inline">aravel </span>S<span class="d-none d-sm-inline">tarter </span>P<span class="d-none d-sm-inline">ack</span></a>
                    <button class="btn text-white float-left" type="button" id="sidebar-toggle">
                        <i class="material-icons">chevron_right</i>
                    </button>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle text-white" type="button" id="notificaciones" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                    </button>
                    <div class="dropdown-menu p-0 dropdown-menu-end" aria-labelledby="notificaciones">
                        <div class="card-header text-center text-muted fs-6">
                            Notificaciones
                        </div>
                        <ul class="list-group scroll-style" style="max-height:30vh;max-width:320px">
                            <a class="list-group-item d-flex w-100 justify-content-between">
                                <i class="material-icons">notifications</i>
                                <span>
                                    <b>Notificacion</b>
                                    <span>Notificacion</span>
                                </span>
                            </a>
                            <a class="list-group-item d-flex w-100 justify-content-between">
                                <i class="material-icons">notifications</i>
                                <span>
                                    notificacion
                                </span>
                            </a>
                        </ul>
                        <div class="card-footer text-center text-muted">
                            Ver todas
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="scaffold">
            <div id="sidebar" class="bg-dark">
                <div id="sidebar-content">
                    <ul class="nav flex-column">
                        <a class="menu-link {{(request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="material-icons">home</i> Inicio
                        </a>
                        <li class="nav-item">
                            <a class="menu-collapse {{(request()->is('config/*')) ? 'active' : '' }}">
                                <i class="material-icons">settings</i> Configurar
                            </a>
                            <div class="menu-items text-white" >
                                <a class="menu-link {{(request()->is('config/users')) ? 'active' : '' }}" href="{{ url('config/users') }}"><i class="material-icons">person</i> Usuarios</a>
                                <a class="menu-link {{(request()->is('config/clients')) ? 'active' : '' }}" href="{{ url('config/clients') }}"><i class="material-icons">domain</i> Clientes</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="menu-collapse {{(request()->is('sesion/*')) ? 'active' : '' }}">
                                <i class="material-icons">manage_accounts</i> Cuenta
                            </a>
                            <div class="menu-items text-white">
                                <a class="menu-link {{(request()->is('sesion/passwordchange')) ? 'active' : '' }}" href="{{ url('sesion/passwordchange') }}"><i class="material-icons">password</i> Cambiar Contraseña</a>
                                <a class="menu-link {{(request()->is('sesion/logout')) ? 'active' : '' }}" href="{{ url('sesion/logout') }}"><i class="material-icons">logout</i> Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="scaffold-body">
                @yield('content')
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let menuCollapse = document.getElementsByClassName('menu-collapse');
                Array.prototype.forEach.call(menuCollapse, function(el) {
                    el.onclick=function(){
                        if(this.classList.contains("active")){
                            this.classList.remove("active");
                        }else{
                            var abierto=document.getElementsByClassName('menu-collapse active')[0];
                            if(abierto){abierto.classList.remove("active");}
                            this.classList.add("active");
                        }
                    }
                });

                var sidebar         = document.getElementById('sidebar');
                var sidebarToggle   = document.getElementById('sidebar-toggle');

                sidebarToggle.addEventListener('click', function (event) {
                    sidebar.classList.toggle('active');
                    this.classList.toggle('active')
                }, false);
            });
        </script>
    </body>
</html>
