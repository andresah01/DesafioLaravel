<?php

namespace App\Http\Controllers;

use App\Models\User as Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function validar_credencial(LoginRequest $request){
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)){
            return redirect()->route('login.formulario')->withErrors('Usuario/Contraseña incorrectos');
        }
        $usuario = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($usuario);
        return $this->autenticado($request, $usuario);
    }

    public function autenticado(Request $request, $usuario){
        return redirect()->route('inicio');
    }

}
