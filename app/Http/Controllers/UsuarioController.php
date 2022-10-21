<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if(auth()->user()->admin === 1){
            $usuarios = User::all();
            //Retornar la vista para listar los usuarios
            return view('auth.index',[
                'usuarios' => $usuarios
            ]);
        }else {
            abort(401);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->admin === 1){
            //Retornar la vista para crear usuarios
            return view('auth.create');
        }else {
            abort(401);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Enviar peticion desde el formulario
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5',
            'nombre' => 'required'
        ]);

        User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => '0',
            'supervisor' => '0',
            'usuario' => '0',
            'registrado_por' => auth()->user()->name
        ]);

        // //Otra forma de autenticar
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);
        
        return redirect('/users/index?id=2506');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->admin === 1){
            $usuario = User::where('name', $id)->first();

            //Retornar la vista para actualizar
            return view('auth.edit',[
                'usuario' => $usuario
            ]);
        }else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Buscar el nombre del usuario a actualizar
        $usuario = User::where('name', $id)->first();

        //Validar y actualizar en la BD
        //Enviar peticion desde el formulario
        $this->validate($request, [
            'password' => 'required|confirmed|min:5',
            'nombre' => 'required'
        ]);
     
        $usuario->password = Hash::make($request->input('password'));
        $usuario->name = $request->input('nombre');
        $usuario->save();

        return redirect('/users/index?id=1506');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::where('name', $id);

        //Eliminar el usuario
        $usuario->delete($id);

        return redirect('/users/index?id=1405');
    }
}
