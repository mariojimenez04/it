<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop_detalle;
use App\Exports\LaptopDetalleExport;
use App\Imports\LaptopImport;
use Maatwebsite\Excel\Facades\Excel;

class LaptopDetalleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function import($id){

        return view('embarques.laptops.excel',[
            'id' => $id
        ]);
    }

    public function importExcel(Request $request, $id){
        $archivo = $request->file('laptop_import');

        Excel::import(new LaptopImport, $archivo);

        return redirect('/laptop/index/' . $id)->with('success', 'Archivo importado exitosamente');
    }

    public function exportExcel($id) {
        return Excel::download(new LaptopDetalleExport($id), 'libros-excel.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $detalle_laptops = Laptop_detalle::where('id_titulo', $id)->get();

        //Retornar la vista de el embarque
        return view('embarques.laptops.index', [
            'id' => $id,
            'detalle_laptops' => $detalle_laptops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_embarque = $id;
        //
        return view('embarques.laptops.create',[
            'id_embarque' => $id_embarque,
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
        //Realizar la validacion
        $this->validate($request,[
            'id_detalle' => 'required',
            'modelo' => 'required',
            'numero_serie' => 'required|alpha_num|unique:laptop_detalles,numero_serie',
            'procesador' => 'required',
            'tamano' => 'required',
            'color' => 'required',
            'capacidad' => 'required',
            'ram' => 'required',
            'cantidad' => 'required|numeric|between:1,1',
        ]);

        Laptop_detalle::create([
            'id_detalle' => $request->id_detalle ?? 'xxxxx',
            'modelo' => $request->modelo ?? 'xxxxx',
            'numero_serie' => $request->numero_serie ?? 'xxxxx',
            'diagnostico' => $request->diagnostico ?? 'xxxxx',
            'acciones' => $request->acciones ?? 'xxxxx',
            'procesador' => $request->procesador ?? 'xxxxx',
            'tamano' => $request->tamano ?? 'xxxxx',
            'color' => $request->color ?? 'xxxxx',
            'capacidad' => $request->capacidad ?? 'xxxxx',
            'ram' => $request->ram ?? 'xxxxx',
            'cantidad' => 1 ?? 'xxxxx',
            'status' => $request->status ?? 'xxxxx',
            'observaciones' => $request->observaciones ?? 'xxxxx',
            'entregado' => 0 ?? 'xxxxx',
            'modificado_por' => auth()->user()->name ?? 'xxxxx',
            'id_titulo' => $id ?? 'xxxxx',
            'pallet' => $$request->pallet ?? 'xxxxx',
        ]);

        return redirect('/laptop/index/'. $id);
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
        $laptop = Laptop_detalle::where('numero_serie', $id)->first();

        //Retornar la vista para editar
        return view('embarques.laptops.edit',[
            'laptop' => $laptop
        ]);
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
        //Actualizar el registro
        $laptop = Laptop_detalle::where('numero_serie', $id)->first();

        $serie = $laptop->id_titulo;

        $this->validate($request,[
            'modelo' => 'required',
            'procesador' => 'required',
            'tamano' => 'required',
            'color' => 'required',
            'capacidad' => 'required',
            'ram' => 'required',
            'cantidad' => 'required|numeric|between:1,1',
        ]);

        $laptop->modelo = $request->modelo;
        $laptop->diagnostico = $request->diagnostico;
        $laptop->acciones = $request->acciones;
        $laptop->procesador = $request->procesador;
        $laptop->tamano = $request->tamano;
        $laptop->color = $request->color;
        $laptop->capacidad = $request->capacidad;
        $laptop->ram = $request->ram;
        $laptop->cantidad = $request->cantidad;
        $laptop->status = $request->status;
        $laptop->observaciones = $request->observaciones;
        $laptop->save();

        return redirect('/laptop/index/' . $serie)->with('success', 'Registro actualizado existosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laptop = Laptop_detalle::where('numero_serie', $id)->first();

        $redirect = $laptop->id_titulo;

        $laptop->delete($id);

        return redirect('/laptop/index/' . $redirect)->with('success', 'Registro eliminado existosamente');
    }
}
