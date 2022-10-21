@extends('layouts.app')

@section('titulo')
    Panel de administracion
@endsection

@section('contenido')
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
                    <form action="">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                        <a href="" class="btn btn-warning">Ver Embarque</a>
                    </form>
                </td>
            </tr>
        @endforeach
    
    </tbody>
</table>
@endsection