@extends('tema.main')

@section('titulo', 'Registro')

@section('contenido')

    <div class="container" style="display: grid; place-items: center;">

        <div class="form-group col-md-6">
            <div class="form-body" style="padding: 10%;">
                <form action="{{ route('register') }}" method="POST">
                    <div class="form-header">
                        <h1 class="form-title"><i class=""></i>Registrate</h1>
                    </div>
                    @csrf
                    @include('tema.mensajes')
                    <div class="form-group">
                        <label> Usuario: </label>
                        <input id="input-usuario" name="username" type="text" class="form-control" placeholder="Ingrese su usuario" value={{ old('usuario') }} >
                    </div>
                    <div class="form-group">
                        <label> Contraseña: </label>
                        <input id="input-contraseña" name="password" type="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                    <div class="form-group">
                        <label> Confirmar contraseña: </label>
                        <input id="input-confirmar-contraseña" name="confirm-password" type="password" class="form-control" placeholder="Confirme su contraseña">
                    </div>
                    <br>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-success" type="submit" id="login">Registrar</button>
                    </div>
                </form>
        </div>
    </div>
    </div>


@endsection
