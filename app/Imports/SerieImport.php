<?php

namespace App\Imports;

use App\Models\Serie;
use Illuminate\Contracts\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SerieImport implements ToModel, WithValidation, WithHeadingRow
{

    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Serie([
            //Retorna los valores para ingresar en la base de datos
            'serie' => $row['serie'],
            'descripcion' => $row['descripcion'],
            'cantidad' => $row['cantidad'],
            'palet' => $row['pallet'],
            'registrador_por' => auth()->user()->name,
            'id_titulo' => $row['embarque'],
        ]);

    }

    public function rules(): array
    {
        return [
            'serie' => [
                'required'
            ],
            'descripcion' => [
                'required'
            ],
            'cantidad' => [
                'required'
            ],
            'pallet' => [
                'required'
            ],
            'embarque' => [
                'required'
            ],
        ];
    }
}
