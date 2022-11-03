@extends('layouts.app')

@section('titulo')
    Panel de administracion
@endsection

@section('contenido')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Embarque</th>
            <th scope="col">Tipo</th>
            <th scope="col">Modificado por</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            @foreach ($embarques as $embarque)
                <tr>
                    <th>{{ $embarque->id }}</th>
                    <th scope="row">{{ $embarque->titulo }}</th>
                    <td>{{ $embarque->descripcion }}</td>
                    <td>{{ $embarque->modificado_por }}</td>
                    <td>
                        @if ($embarque->descripcion === 'Laptops')
                            <a href="{{ route('laptop.index', $embarque->id_emb) }}" class="btn btn-warning">Ver Embarque</a>
                            @elseif ($embarque->descripcion === 'Productos')
                            <a href="{{ route('productos.index', $embarque->id_emb) }}" class="btn btn-warning">Ver Embarque</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        
        </tbody>
    </table>
</div>

@endsection