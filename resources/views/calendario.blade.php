@extends('tema.main')

@section('titulo', 'Calendario de citas')
@section('contenido')
    <div class="frames-container-application" style="display: grid; place-items: center;">
        <div class="container">
            <div id="calendario">
            </div>
        </div>

        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="modal_citas" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId"> Cita </h5>
                        <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-body" style="padding: 10%;">
                            <form id="info_cita" method="POST">
                                <div class="form-header">
                                    <h1 class="form-title">Información de la cita</h1>
                                </div>
                                <div class="form-group">
                                    <label for="documento"> Documento de identidad </label>
                                    <input id="documento" name="documento" type="text" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nombre"> Nombre </label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="apellidos"> Apellidos </label>
                                    <input id="apellidos" name="apellidos" type="text" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nombreMascota"> Nombre de mascota </label>
                                    <input id="nombreMascota" name="nombreMascota" type="text" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="fechaCita"> Fecha para la cita </label>
                                    <input id="fechaCita" name="fechaCita" type="date" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="horaCita"> Hora para la cita </label>
                                    <input id="horaCita" name="horaCita" type="time" class="form-control" disabled >
                                </div>
                            </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('assets/js/calendario.js')}}"></script>
@endsection
