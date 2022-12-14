<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'movimiento',
        'usuario',
        'equipo',
        'direccion_ip',
    ];
}
