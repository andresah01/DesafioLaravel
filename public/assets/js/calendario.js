document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        initialView: 'dayGridMonth',
        headerToolbar:{
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: baseURL+'/calendario/citas',
        eventTimeFormat: { // like '14:30:00'
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        },
        eventClick: function(info){
            axios.post(baseURL+"/calendario/citas/info_cita/"+info.event.extendedProps.id_cita).
            then((respuesta)=>{
                var fecha = new Date(respuesta.data[0].fecha_cita);
                info_cita.documento.value = respuesta.data[0].documento;
                info_cita.nombre.value = respuesta.data[0].nombre;
                info_cita.apellidos.value = respuesta.data[0].apellidos;
                info_cita.nombreMascota.value = respuesta.data[0].mascota;
                info_cita.fechaCita.valueAsDate = fecha;
                info_cita.horaCita.value = fecha.toLocaleTimeString();
                $("#modal_citas").modal("show");
            })
        }
    });
    calendar.render();
});
