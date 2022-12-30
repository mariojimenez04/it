<?php

namespace App\Http\Controllers;

use App\Models\MovimientoProducto;
use Illuminate\Http\Request;

class MovimientoProductoController extends Controller
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
     * @param  \App\Models\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function show(MovimientoProducto $movimientoProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(MovimientoProducto $movimientoProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovimientoProducto $movimientoProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovimientoProducto  $movimientoProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovimientoProducto $movimientoProducto)
    {
        //
    }
}
