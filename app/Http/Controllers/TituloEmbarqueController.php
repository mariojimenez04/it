<?php

namespace App\Http\Controllers;

use App\Models\Titulo_embarque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TituloEmbarqueController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $embarques = Titulo_embarque::all();

        //Retornar la vista de los embarques
        return view('embarques.index',[
            'embarques' => $embarques
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_emb = 'EMB-' . rand();
        //Retornar la vista para crear embarques
        return view('embarques.create', [
            'id_emb' => $id_emb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Registrar el embarque
        $this->validate($request, [
            'id_emb' => 'required|unique:titulo_embarques',
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        Titulo_embarque::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'modificado_por' => auth()->user()->name,
            'id_emb' => $request->id_emb
        ]);

        return redirect()->route('embarque.index')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Titulo_embarque  $titulo_embarque
     * @return \Illuminate\Http\Response
     */
    public function show(Titulo_embarque $titulo_embarque)
    {
        //Retornar la vista para ver el embarque
        return view('embarques.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Titulo_embarque  $titulo_embarque
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulo_embarque $titulo_embarque)
    {
        // dd($titulo_embarque);
        $embarque = $titulo_embarque;
        //Retornar la vista para editar el embarque
        return view('embarques.edit',[
            'embarque' => $embarque,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Titulo_embarque  $titulo_embarque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titulo_embarque $titulo_embarque)
    {
        // dd('Actualizando');
        $embarque = $titulo_embarque;
        // dd($usuario);
        //Actualizar la tabla de titulo embarque
        $this->validate($request,[
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        $embarque->titulo = $request->titulo;
        $embarque->descripcion = $request->descripcion;
        $embarque->save();

        return redirect()->route('embarque.index')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Titulo_embarque  $titulo_embarque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulo_embarque $titulo_embarque)
    {
        $embarque = $titulo_embarque;
        //Eliminar el embarque
        $embarque->delete($titulo_embarque);

        return redirect()->route('embarque.index')->with('success', 'Registro eliminado exitosamente');
    }
}
