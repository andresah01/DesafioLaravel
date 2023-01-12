@extends('tema.main')

@section('titulo', 'Menu')

@section('contenido')
    <div class="frames-container-application" style="display: grid; place-items: center;">
        <div class="heading-container">
            <h1>Veterinaria laravel</h1>
        </div>
        <div class="details-container">
            <p> Clinica veterinaria laravel en la ciudad de Medellin. </p>
            <p> Contamos con equipos nuevos de última tecnología y personal xapacitado para ofrecerte siempre el mejor servicio,
                dando una respuesta rápida y oportuna a las necesidades de tu mascota.
            </p>
            <p> Nuestro servicios </p>
            <ul class="list-group mb-0">
                <li class="list-group-item"> Consulta </li>
                <li class="list-group-item"> Desparasitación </li>
                <li class="list-group-item"> Vacunación </li>
                <li class="list-group-item"> Imagenología </li>
                <li class="list-group-item"> Peluqueria</li>
                <li class="list-group-item">  Laboratorio </li>
            </ul>
        </div>
        <br>
        <div class="details-container" style="display: grid; place-items: center;">
            <a href="{{route('cita.agendar')}}" class="btn btn-primary" role="button"> Reserva tu cita </a>
        </div>
    </div>

@endsection
