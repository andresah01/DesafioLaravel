@extends('tema.main')

@section('titulo', 'Iniciar sesion')

@section('contenido')
    <div class="frames-container-application" style="display: grid; place-items: center;">
        <div class="form-group col-md-6" >
            <div class="form-body" style="padding: 10%;">
                <form action="{{ route('login.validar') }}" method="POST">
                    <div class="form-header">
                        <h1 class="form-title">Inicia sesión</h1>
                    </div>
                    @csrf
                    @include('tema.mensajes')
                    <div class="form-group">
                        <label for="inputUsuario" > Usuario </label>
                        <input id="inputUsuario" name="username" type="text" class="form-control" placeholder="Ingrese su usuario" value={{ old('username') }} >
                    </div>
                    <div class="form-group">
                        <label for="inputContraseña"> Contraseña </label>
                        <input id="inputContraseña" name="password" type="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>

                    <div style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-success" type="submit" id="login">Iniciar sesion</button>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
                <div style="display: flex; justify-content: center; align-items: center;">
                    <a class="" href="{{ route("register.formulario")}} "> Crea tu cuenta </a>
                </div>
            </div>

        </div>
    </div>


@endsection
