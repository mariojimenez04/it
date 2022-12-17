<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Isla;
use App\Models\Linea;
use App\Models\MovimientoProducto;
use App\Models\Producto;
use App\Models\Titulo_embarque;
use Illuminate\Http\Request;

class ProductoController extends Controller
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
    public function index($id)
    {
        $clientes = Cliente::all();
        $productos = Producto::where('id_titulo', $id)->get();
        $titulo = $id;

        return view('embarques.productos.index',[
            'productos' => $productos,
            'titulo' => $titulo,
            'clientes' => $clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_titulo = Titulo_embarque::where('id_emb', $id)->first();
        $lineas = Linea::all();
        $islas = Isla::all();

        //Retornar la vista para registrar productos
        return view('embarques.productos.create',[
            'id_titulo' => $id_titulo,
            'lineas' => $lineas,
            'islas' => $islas,
        
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
        //Validar la informacion
        // $this->validate($request,[
        //     'linea' => 'required',
        //     'isla' => 'required',
        //     'producto' => 'required',
        //     'marca' => 'required',
        //     'modelo' => 'required',
        //     'color' => 'required',
        //     'cantidad' => 'required',
        // ]);
        
        MovimientoProducto::create([
            'movimiento' => 'El usuario ' . auth()->user()->name . ' registro el producto ' . $request->producto . ' con numero de serie ' . $request->numero_serie . ' el día ' . date('d-M-Y H:i:s'),
            'usuario' => auth()->user()->name,
            'equipo' => gethostname(),
            'direccion_ip' => $request->ip()
        ]);

        Producto::create([
            'linea' => $request->linea ?? 'XXX',
            'isla' => $request->isla ?? 'XXX',
            'codigo' => $request->codigo ?? 'XXX',
            'producto' => $request->producto ?? 'XXX',
            'marca' => $request->marca ?? 'XXX',
            'modelo' => $request->modelo ?? 'XXX',
            'color' => $request->color ?? 'XXX',
            'cantidad' => $request->cantidad ?? 0,
            'comentarios' => $request->comentarios ?? 'XXX',
            'modificado_por' => auth()->user()->name,
            'id_titulo' => $id,
            'total_entregado' => 0,
            'numero_serie' => $request->numero_serie ?? 'XXX'
        ]);

        return redirect('/productos/index/' . $id)->with('success', 'Registro creado exitosamente');
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
        if (auth()->user()->admin === 1 || auth()->user()->supervisor === 1) {
            # code...
                $producto = Producto::where('id', $id)->first();
                $lineas = Linea::all();
            if(!$producto){
                abort(404);
            }
            // dd($lineas);
            //
            return view('embarques.productos.edit', [
                'producto' => $producto,
                'lineas' => $lineas
            ]);
        }else {
            abort(404);
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
        $producto = Producto::where('id', $id)->first();
        $enlace = $producto->id_titulo;

        //
        $this->validate($request,[
            'linea' => 'required',
            'isla' => 'required',
            'producto' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'cantidad' => 'required',
        ]);

        $producto->linea = $request->linea;
        $producto->isla = $request->isla;
        $producto->producto = $request->producto;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->color = $request->color;
        $producto->cantidad = $request->cantidad;
        $producto->comentarios = $request->comentarios;
        $producto->modificado_por = auth()->user()->name;
        $producto->numero_serie = $request->numero_serie;
        $producto->save();

        return redirect('/productos/index/' . $enlace)->with('success', 'Registro creado exitosamente');
    }

    public function entrega(Request $request, $id) {
        $producto = Producto::where('id', $id)->first();
        $enlace = $producto->id_titulo;

        $this->validate($request,[
            'cliente' => 'required',
            'total_entregado', 
        ]);

        $total = $producto->cantidad - $request->por_entregar;

        $totalEntregado = $producto->total_entregado + $request->por_entregar;

        $producto->cantidad = $total;
        $producto->total_entregado = $totalEntregado;
        $producto->cliente = $request->cliente;
        $producto->save();

        return redirect('/productos/index/' . $enlace)->with('success', 'Registro actualizado correctamente');
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
