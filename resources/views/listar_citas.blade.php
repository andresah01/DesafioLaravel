@extends('tema.main')

@section('titulo', 'Listar citas')

@section('contenido')
    <?php use Carbon\Carbon; ?>
    <div class="frames-container-application" style="display: grid; place-items: center;">
        <div class="form-group col-md-8" >
            <div class="form-body" style="padding: 10%;">
                <form action="{{ route('cita.listar_por_fecha')}}" method="POST">
                    <div class="form-header">
                        <h1 class="form-title">Listar citas</h1>
                    </div>
                    @csrf
                    @include('tema.mensajes')
                    <div class="form-group">
                        <label for="fechaCita"> Fecha a buscar </label>
                        <input id="fechaCita" name="fechaCita" type="date" class="form-control"  value={{ old('fechaCita') }}>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-success" type="submit" id="listarCita">Consultar citas</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container col-md-8" id="results">
            @if (!isset($citas))
                <label for=""> Fecha: </label>
            @else
                <label for=""> Fecha: {{ Carbon::create($fecha)->toDateString() }} </label>
                @if(empty($citas->first()))
                    <div class="container" style="display: grid; place-items: center;"">
                        <p class="text-"> No hay citas reservadas para la fecha </p>
                    </div>
                @else
                <table class="table">
                    <thead class="thead-light">
                         <tr>
                            <th> Fecha </th>
                            <th> Hora </th>
                            <th> Mascota </th>
                            <th> Dueño </th>
                            <th> Estado </th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                        <tr>
                            <?php $date = Carbon::create($cita['fecha_cita']); ?>
                            <form role="form" action="{{ route('cita.editar_cita',$cita->id_cita) }}" method="POST" id="editar_cita">
                                @csrf
                                <td>{{ $date->toDateString()}}</td>
                                <td>{{ $date->format('H:i')}}</td>
                                <td>{{ $cita->mascota}}</td>
                                <td>{{ $cita->nombre}}</td>
                                <td>{{ $cita->estado() }}</td>
                                <td>
                                @if (strcmp($cita->estado(),'Finalizada') != 0)
                                     <button class="btn btn-success" type="submit">Editar</button>
                                @endif
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            @endif

            @if(isset($citas))

            @endif
        </div>
    </div>
@endsection



