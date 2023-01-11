<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ClienteController as Cliente;
use App\Http\Requests\CitaRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{

    public function agendar(CitaRequest $request){
        $fecha_cita = Carbon::create($request->input("fechaCita")." ".$request->input("horaCita"));
        $documento = $request->input('documento');
        // Validar si el cliente ya existe en la BD, si no existe, procedemos a crearlo
        if(Cliente::validar_cliente($documento)){
            $cliente = $request->only('documento','nombre','apellidos');
            Cliente::crear_cliente($cliente);
        }
        // Validar si la fecha y hora de la cita estan disponibles, si no estan disponibles,
        // redireccionamos hacia el formulario indicando que la fecha no esta disponible
        if(!self::validar_fecha($fecha_cita)){
            return redirect()->route('cita.agendar')->withErrors('Ya hay una cita programada/en transcurso para ese horario, por favor seleccione otra fecha.');
        }
        $cita = [
            'fecha_cita' => $fecha_cita->format('Y-m-d H:i:00'),
            'start' => $fecha_cita->format('Y-m-d H:i:00'),
            'end' => $fecha_cita->addMinutes(30)->format('Y-m-d H:i:00'),
            'id_cliente' => $request->input('documento'),
            'mascota' => $request->input('nombreMascota')
        ];
        Cita::create($cita);
        return redirect()->route('cita.agendar')->with('success','Su cita ha sido reservada para el dia '.$request->input("fechaCita").' a las '.$request->input("horaCita").'.');
    }

    public function listar_citas_por_fecha(Request $request){
        // Consultamos todas las citas para la fecha recibida
        $request->validate([
            'fechaCita' => 'required'
        ]);
        $citas = Cita::join("cliente as c","id_cliente","=","c.documento")->where([['fecha_cita','LIKE','%'.$request->input('fechaCita').'%']])->select("id_cita","fecha_cita","id_estado","mascota","c.nombre")->orderby('fecha_cita','asc')->get();
        return view('listar_citas')->with(['citas' => $citas, 'fecha' => $request->input('fechaCita')]);
    }

    public function editar_cita($id_cita){
        // Consultamos los datos de la cita y los retornamos al formulario de editar para rellenar los campos con la informacion
        $cita = self::datos_cita($id_cita);
        return view('editar_cita')->with('cita',$cita);
    }

    public function actualizar_cita($id_cita, CitaRequest $request){
        $cita = self::datos_cita($id_cita);
        $fecha_actual = Carbon::parse($cita->first()->fecha_cita)->format('Y-m-d H:i:00');
        $nueva_fecha = Carbon::create($request->input("fechaCita")." ".$request->input("horaCita"));
        if($nueva_fecha == $fecha_actual){
            self::actualizar_estado($id_cita, $request->get('estadoCita'));
            $cita = self::datos_cita($id_cita);
            return view('editar_cita')->with(['cita' => $cita, 'success'=> collect(['Cita actualizada con exito.'])]);
        }else{
            if(!self::validar_fecha($nueva_fecha)){
                return view('editar_cita')->with(['cita' => $cita, 'errors'=> collect(['Ya hay una cita programada/en transcurso para ese horario, por favor seleccione otra fecha.'])]);
            }else{
                self::actualizar_estado($id_cita, $request->get('estadoCita'));
                self::actualizar_fecha($id_cita, $nueva_fecha);
                $cita = self::datos_cita($id_cita);
                return view('editar_cita')->with(['cita' => $cita, 'success'=> collect(['Cita actualizada con exito.'])]);
            }
        }
    }

    public function datos_cita($id_cita){
        // Consultar todos los datos de la cita id, fecha, estado, documento de la persona, nombre, mascota
        $cita = Cita::join("cliente as c","id_cliente","=","c.documento")->where('id_cita',$id_cita)->select("id_cita","fecha_cita","id_estado","mascota","c.nombre","c.apellidos","c.documento")->get();
        return $cita;
    }

    public function validar_fecha($fecha){
        // Validamos si hay una cita activa con la fecha recibida
        $citas = Cita::where([['fecha_cita','LIKE','%'.$fecha->toDateString().'%'],['id_estado',1]])->get();
        foreach($citas as $cita){
            $fecha_cita = Carbon::create($cita->fecha_cita);
            if($fecha_cita->diffInMinutes($fecha) < 30){
                return False;
            }
        }
        return True;
    }

    public function actualizar_estado($id_cita, $id_estado){
        Cita::where('id_cita',$id_cita)->update(['id_estado' => $id_estado]);
    }

    public function actualizar_fecha($id_cita, $nueva_fecha){
        Cita::where('id_cita',$id_cita)->update(['fecha_cita' => $nueva_fecha->format('Y-m-d H:i:00'), 'start' => $nueva_fecha->format('Y-m-d H:i:00'), 'end' => $nueva_fecha->addMinutes(30)->format('Y-m-d H:i:00')]);
    }

    public function listar_citas_activas(){
        $citas = Cita::where('id_estado', '1')->get();
        return response()->json($citas);
    }

    public function datos_cita_calendario($id_cita){
        $cita = self::datos_cita($id_cita);
        return response()->json($cita);
    }

}
