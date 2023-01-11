@extends('tema.main')

@section('titulo', 'Reservar cita')

@section('contenido')
    <?php use Carbon\Carbon;
    $fecha_actual = Carbon::now()->subHours(5); ?>
    <div class="frames-container-application" style="display: grid; place-items: center;">
        <div class="form-group col-md-8" >
            <div class="form-body" style="padding: 10%;">
                <form action="{{route('cita.agendar')}}" method="POST">
                    <div class="form-header">
                        <h1 class="form-title">Reservar cita</h1>
                    </div>
                    @csrf
                    @include('tema.mensajes')
                    <div class="form-group">
                        <label for="inputDocumento" > Documento de identidad </label>
                        <input id="inputDocumento" name="documento" type="text" class="form-control" placeholder="Ingrese su numero de documento" value={{ old('documento') }} >
                    </div>
                    <div class="form-group">
                        <label for="inputNombres"> Nombre </label>
                        <input id="inputNombres" name="nombre" type="text" class="form-control" placeholder="Ingrese su nombre" value={{ old('nombre') }}>
                    </div>
                    <div class="form-group">
                        <label for="inputApellidos"> Apellidos </label>
                        <input id="inputApellidos" name="apellidos" type="text" class="form-control" placeholder="Ingrese sus apellidos" value={{ old('apellidos') }}>
                    </div>
                    <div class="form-group">
                        <label for="inputNombreMascota"> Nombre de mascota </label>
                        <input id="inputNombreMascota" name="nombreMascota" type="text" class="form-control" placeholder="Ingrese nombre de su mascota" value={{ old('nombreMascota') }}>
                    </div>
                    <div class="form-group">
                        <label for="fechaCita"> Fecha para la cita </label>
                        <input id="fechaCita" name="fechaCita" type="date" class="form-control" min="{{ $fecha_actual->toDateString(); }}" value={{ old('fechaCita') }}>
                    </div>
                    <div class="form-group">
                        <label for="horaCita"> Hora para la cita </label>
                        <input id="horaCita" name="horaCita" type="time" class="form-control" value={{ old('horaCita') }}>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-success" type="submit" id="reservarCita"> Reserva tu cita </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
