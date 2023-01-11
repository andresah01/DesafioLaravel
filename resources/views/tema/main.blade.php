<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- full calendar api -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.2/index.global.min.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <script type="text/javascript">
        var baseURL = {!!json_encode(url('/'))!!}
    </script>

    <title>@yield('titulo')</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route("inicio")}} "> Inicio </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cita.formulario')}}">Reservar cita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cita.listar_formulario')}}">Listar citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('citas.calendario')}}"> Mostrar calendario </a>
                    </li>
                </ul>
                @guest
                <form action="{{ route('login.formulario') }}" method="GET" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-dark my-2 my-sm-0 btn-sm" type="submit"> Iniciar Sesion </button>
                </form>
                <form action="{{ route('register.formulario') }}" mehotd="GET" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-dark my-2 my-sm-0 btn-sm" type="submit"> Registrarse </button>
                </form>
                @endguest
                @auth
                    <ul class="navbar mr-4 mb-2 mb-lg-0">
                        <li class="nav item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ auth()->user()->username }} </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Configuracion</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout')}}">Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>

        </nav>


    <div class="container">
        @yield('contenido')
    </div>
</body>
</html>
