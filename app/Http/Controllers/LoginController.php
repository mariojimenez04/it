<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
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

        // //Autenticar al usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        return redirect('/index');
    }

    public function logout(Request $request){
        auth()->logout();

        return redirect()->route('login');
    }
}
