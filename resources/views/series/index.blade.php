@extends('layouts.app')

@section('botones')
    <a href="{{ route('laptop.index', $embarque) }}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Series - Embarque - {{ $embarque }}
@endsection

@section('contenido')
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Serie</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Palet</th>
        <th scope="col">Registrado por</th>
        <th scope="col">Registrado el</th>
        <th scope="col">Ultima actualizacion</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">

        @foreach ($series as $serie)
            <tr>
                <th>{{ $serie->id }}</th>
                <th scope="row">{{ $serie->serie }}</th>
                <td>{{ $serie->descripcion }}</td>
                <td>{{ $serie->cantidad }}</td>
                <td>{{ $serie->palet }}</td>
                <td>{{ $serie->registrado_por }}</td>
                <td>{{ $serie->created_at }}</td>
                <td>{{ $serie->updated_at }}</td>
                <td>
                    <form action="">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
    
    </tbody>
</table>
@endsection