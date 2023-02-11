<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop_detalle;
use App\Exports\LaptopDetalleExport;
use App\Imports\LaptopImport;
use App\Models\Cliente;
use App\Models\Devolucion;
use App\Models\DevolucionLaptop;
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

    public function venta(Request $request, $id){

        $registro = Laptop_detalle::where('id_detalle', $id)->first();

        $id_titulo = $registro->id_titulo;

        $this->validate($request, [
            'cliente' => 'required'
        ]);

        $registro->vendido_a = $request->cliente;
        $registro->entregado = 1;
        $registro->save();

        return redirect('/laptop/index/' . $id_titulo)->with('success', 'Registro actualizado existosamente');
    }

    public function devolucion(Request $request, $id) {
        $registro = Laptop_detalle::where('id', $id)->first();

        $id_titulo = $registro->id_titulo;

        $this->validate($request, [
            'motivo' => 'required'
        ]);

        DevolucionLaptop::create([
            'motivo' => $request->motivo,
            'registrado_por' => auth()->user()->name,
            'id_laptop' => $id
        ]);

        $registro->vendido_a = '';
        $registro->entregado = 0;
        $registro->save();

        return redirect('/laptop/index/' . $id_titulo)->with('success', 'Registro actualizado existosamente');
    }

    public function importExcel(Request $request, $id){
        $archivo = $request->file('laptop_import');

        Excel::import(new LaptopImport, $archivo);

        return redirect('/laptop/index/' . $id)->with('success', 'Archivo importado exitosamente');
    }

    public function exportExcel($id) {
        return Excel::download(new LaptopDetalleExport($id), $id . '-libros-excel.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $clientes = Cliente::all();
        $vendido = Laptop_detalle::where('entregado', 1)->where('id_titulo', $id)->count();
        $no_vendido = Laptop_detalle::where('entregado', 0)->where('id_titulo', $id)->count();
        $laptop_general = Laptop_detalle::where('id_titulo', $id)->orderBy('id_detalle', 'asc')->get();
        $laptop_entregadas = Laptop_detalle::where('id_titulo', $id)->where('entregado', 1)->orderBy('id_detalle', 'asc')->get();
        $laptop_noEntregadas = Laptop_detalle::where('id_titulo', $id)->where('entregado', 0)->orderBy('id_detalle', 'asc')->get();

        //Retornar la vista de el embarque
        return view('embarques.laptops.index', [
            'id' => $id,
            'laptop_general' => $laptop_general,
            'vendido' => $vendido,
            'no_vendido' => $no_vendido,
            'clientes' => $clientes,
            'laptop_entregadas' => $laptop_entregadas,
            'laptop_noEntregadas' => $laptop_noEntregadas,
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
            'id_detalle' => $request->id_detalle,
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
            'condicion' => $request->status ?? 'xxxxx',
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

        $laptop->modelo = $request->modelo ?? 'XXXX';
        $laptop->numero_serie = $request->numero_serie ?? 'XXXX';
        $laptop->diagnostico = $request->diagnostico ?? 'XXXX';
        $laptop->acciones = $request->acciones ?? 'XXXX';
        $laptop->procesador = $request->procesador ?? 'XXXX';
        $laptop->tamano = $request->tamano ?? 'XXXX';
        $laptop->color = $request->color ?? 'XXXX';
        $laptop->capacidad = $request->capacidad ?? 'XXXX';
        $laptop->ram = $request->ram ?? 'XXXX';
        $laptop->cantidad = $request->cantidad ?? 'XXXX';
        $laptop->condicion = $request->condicion ?? 'XXXX';
        $laptop->observaciones = $request->observaciones ?? 'XXXX';
        $laptop->pallet = $request->pallet ?? 'XXXX';
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
