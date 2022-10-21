<?php

namespace App\Http\Controllers;

use App\Imports\SerieImport;
use App\Models\Serie;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $series = Serie::where('id_titulo', $id)->get();
        $embarque = $id;
        //Retornar la vista de las series
        return view('series.index', [
            'embarque' => $embarque,
            'series' => $series
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($titulo)
    {
        //Retornar la vista
        return view('series.create',[
            'titulo' => $titulo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //

        $archivo = $request->file('serie');

        Excel::import(new SerieImport, $archivo);

        return redirect('/laptop/index/' . $id)->with('success', 'Archivo importado exitosamente');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
