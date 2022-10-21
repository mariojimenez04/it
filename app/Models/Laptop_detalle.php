<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop_detalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_detalle',
        'modelo',
        'numero_serie',
        'diagnostico',
        'acciones',
        'procesador',
        'tamano',
        'color',
        'capacidad',
        'ram',
        'cantidad',
        'status',
        'observaciones',
        'entregado',
        'modificado_por',
        'id_titulo',
        'pallet',
    ];
}
