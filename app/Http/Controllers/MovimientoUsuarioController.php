<?php

namespace App\Http\Controllers;

use App\Models\MovimientoUsuario;
use Illuminate\Http\Request;

class MovimientoUsuarioController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovimientoUsuario  $movimientoUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoUsuario $movimientoUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovimientoUsuario  $movimientoUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimientoUsuario $movimientoUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovimientoUsuario  $movimientoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimientoUsuario $movimientoUsuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovimientoUsuario  $movimientoUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoUsuario $movimientoUsuario)
    {
        //
    }
}
