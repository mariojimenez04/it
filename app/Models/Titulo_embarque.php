<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo_embarque extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_emb',
        'titulo',
        'descripcion',
        'modificado_por',
        'user_id'
    ];
}
