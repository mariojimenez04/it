<?php

namespace App\Exports;

use App\Invoice;
use App\Models\Laptop_detalle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaptopDetalleExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function __construct($id_titulo)
    {
        $this->id_titulo = $id_titulo;
    }

    public function headings(): array
    {
        return [
            'id base de datos',
            'id laptop',
            'modelo',
            'numero serie',
            'observaciones',
            'diagnostico',
            'acciones',
            'procesador',
            'tamaño',
            'color',
            'capacidad',
            'ram',
            'cantidad',
            'condicion',
            'status',
            'modificado por',
            'id embarque',
            'fecha registro',
            'fecha actualizado',
            'pallet',
        ];
    }

    public function query()
    {
        return Laptop_detalle::query()->where('id_titulo', $this->id_titulo);
    }

    // public function laptopSelection($id){
    //     return Laptop_detalle::where('id_titulo', $id)->get();
    // }
}
