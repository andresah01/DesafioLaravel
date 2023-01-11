<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public static function crear_cliente($usuario){
        Cliente::create($usuario);
    }

    public static function validar_cliente($documento){
        return Cliente::where('documento',$documento)->get()->isEmpty();
    }
}
