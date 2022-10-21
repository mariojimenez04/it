@extends('layouts.app')

@section('botones')
    <a href="{{ route('index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('embarque.create') }}" class="btn btn-dark">Registrar nuevo embarque</a>
@endsection

@section('titulo')
    Administracion - Embarques
@endsection

@section('contenido')

@if ( session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Embarque</th>
        <th scope="col">Tipo</th>
        @if (auth()->user()->admin === 1)
            <th scope="col">Modificado por</th>
        @endif
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">

        @foreach ($embarques as $embarque)
            <tr>
                <th>{{ $embarque->id_emb }}</th>
                <th scope="row">{{ $embarque->titulo }}</th>
                <td>{{ $embarque->descripcion }}</td>
                @if (auth()->user()->admin === 1)
                    <td>{{ $embarque->modificado_por }}</td>
                @endif
                <td class="d-flex gap-3">
                    <form action="{{ route('embarque.destroy', $embarque) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                    <a href="{{ route('embarque.edit', $embarque) }}" class="btn btn-warning">Editar Embarque</a>
                    <a href="{{ route('laptop.index', $embarque->id_emb) }}" class="btn btn-success">Ver embarque(detalles)</a>
                </td>
            </tr>
        @endforeach
    
    </tbody>
</table>
@endsection