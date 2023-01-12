@extends('tema.main')

@section('titulo', 'Inicio')

@section('contenido')
    <div class="frames-container-application" style="display: grid; place-items: center;">
        <div class="heading-container">
            <h1>Veterinaria Laravel</h1>
        </div>
        <div class="details-container">
            <p> Clinica veterinaria Laravel en la ciudad de Medellin. </p>
            <p> Contamos con equipos nuevos de última tecnología y personal capacitado para ofrecerte siempre el mejor servicio,
                dando una respuesta rápida y oportuna a las necesidades de tu mascota.
            </p>
            <p> Nuestro servicios </p>
            <div class="list-group">
                <a href="{{route('cita.agendar')}}" class="list-group-item list-group-item-action"> Consulta </a>
                <a href="{{route('cita.agendar')}}" class="list-group-item list-group-item-action"> Desparasitación </a>
                <a href="{{route('cita.agendar')}}" class="list-group-item list-group-item-action"> Vacunación </a>
                <a href="{{route('cita.agendar')}}" class="list-group-item list-group-item-action"> Imagenología </a>
                <a href="{{route('cita.agendar')}}" class="list-group-item list-group-item-action"> Peluquería </a>
                <a href="{{route('cita.agendar')}}" class="list-group-item list-group-item-action"> Laboratorio </a>
            </div>
        </div>
        <br>
        <div class="details-container" style="display: grid; place-items: center;">
            <a href="{{route('cita.agendar')}}" class="btn btn-primary" role="button"> Reserva tu cita </a>
        </div>
    </div>

@endsection
