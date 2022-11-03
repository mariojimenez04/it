<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionLaptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo',
        'registrado_por',
        'id_laptop'
    ];
}