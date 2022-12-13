<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MovimientoUsuario;

class LoginController extends Controller
{
    public function login(){
        // dd($_SERVER);
        //Retornar la vista del login
        return view('welcome');
    }

    public function validacion(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if( !auth()->attempt($request->only('email', 'password')) ){
            return back()->with('mensaje', 'Credenciales incorrectas'); 
        }

        MovimientoUsuario::create([
            'movimiento' => 'El usuario ' . auth()->user()->name . ' con el correo ' . $request->email . ' inicio sesion en fecha de ' . date('d-M-Y H:i:s'),
            'usuario' => auth()->user()->name,
            'equipo' => gethostname(),
            'direccion_ip' => $request->ip()
        ]);

        // //Autenticar al usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        return redirect('/index');
    }

    public function logout(Request $request){
        MovimientoUsuario::create([
            'movimiento' => 'El usuario ' . auth()->user()->name . ' con el correo ' . auth()->user()->email . ' cerro sesion en fecha de ' . date('d-M-Y H:i:s'),
            'usuario' => auth()->user()->name,
            'equipo' => gethostname(),
            'direccion_ip' => $request->ip()
        ]);

        auth()->logout();

        return redirect()->route('login');
    }
}
