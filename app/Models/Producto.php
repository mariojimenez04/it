<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'linea',
        'isla',
        'codigo',
        'producto',
        'marca',
        'modelo',
        'color',
        'cantidad',
        'comentarios',
        'modificado_por',
        'id_titulo',
        'total_entregado',
        'cliente',
        'por_entregar'
    ];
}
