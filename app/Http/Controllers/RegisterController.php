<?php

namespace App\Http\Controllers;

use App\Models\User as Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user = Usuario::create($request->validated());
        return redirect()->route('login.formulario')->with('success','Cuenta creada con exito');
    }

}
