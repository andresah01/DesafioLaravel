@extends('tema.main')

@section('titulo', 'Editar cita')

@section('contenido')
    <?php use Carbon\Carbon; ?>
    @if (!empty($cita->first()))
    <?php
        $cita = $cita->first();
        $estados = $cita->estados();
        $fecha_actual = Carbon::now()->subHours(5);
        $fecha_cita = Carbon::create($cita->fecha_cita);
        $editable = $fecha_cita->diffInMinutes($fecha_actual) > 120;
    ?>
    <div class="frames-container-application" style="display: grid; place-items: center;">
        <div class="form-group col-md-8" >
            <div class="form-body" style="padding: 10%;">
                <form action="{{route('cita.actualizar_cita',$cita->id_cita)}}" method="POST">
                    @csrf
                    @method('put')
                    @if (!$editable)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled mb-0">
                                <li> Faltan 2 horas o menos para la cita, no puede ser editada. </li>
                            </ul>
                        </div>
                    @endif
                    <div class="form-header">
                        <h1 class="form-title">Editar cita</h1>
                    </div>
                    @include('tema.mensajes')
                    <div class="form-group">
                        <label for="inputDocumento"> Documento de identidad </label>
                        <input id="inputDocumento" name="documento" type="text" class="form-control" value={{ $cita->documento }} readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="inputNombres"> Nombre </label>
                        <input id="inputNombres" name="nombre" type="text" class="form-control" value={{ $cita->nombre }} readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="inputApellidos"> Apellidos </label>
                        <input id="inputApellidos" name="apellidos" type="text" class="form-control" value={{ $cita->apellidos }} readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="inputNombreMascota"> Nombre de mascota </label>
                        <input id="inputNombreMascota" name="nombreMascota" type="text" class="form-control" value={{ $cita->mascota }} readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="fechaCita"> Fecha para la cita </label>
                        <input id="fechaCita" name="fechaCita" type="date" class="form-control" min="{{ $fecha_actual->toDateString() }}" value={{ $fecha_cita->toDateString() }} @if(!$editable) readonly="readonly" @endif>
                    </div>
                    <div class="form-group">
                        <label for="horaCita"> Hora para la cita </label>
                        <input id="horaCita" name="horaCita" type="time" class="form-control" value={{ $fecha_cita->toTimeString() }} @if(!$editable) readonly="readonly" @endif>
                    </div>
                    <div class="form-group">
                        <label for="estadoCita"> Estado </label>
                        <select id="estadoCita" name="estadoCita" class="form-control" @if(!$editable) disabled @endif>
                        @foreach ($estados as $estado)
                            @if ($cita->id_estado == key($estados))
                                <option selected value="{{key($estados)}}"> {{$estado}}</option>
                            @else
                                <option value="{{key($estados)}}"> {{$estado}}</option>
                            @endif
                            <?php next($estados) ?>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="display: flex; justify-content: center; align-items: center;">
                        <a href="{{route('cita.listar_por_fecha')}}" class="btn btn-secondary inline" role="button" id="volver" name="volver"> Volver </a>
                        <button class="btn btn-success" type="submit" id="actualizarCita" name="actualizarCita"> Actualizar cita </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection
