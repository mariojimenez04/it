<?php

namespace App\Http\Controllers;

use App\Models\Titulo_embarque;
use Illuminate\Http\Request;

class EmbarqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //

    public function indexProductos(){
        $embarques = Titulo_embarque::where('descripcion', 'Productos')->get();
        //Retornar la vista
        return view('embarques.indexproductos',[
            'embarques' => $embarques
        ]);
    }
}
