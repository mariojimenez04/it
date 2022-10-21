@extends('layouts.app')

@section('botones')
    <a href="{{ route('admin.index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('processor.create') }}" class="btn btn-dark">Crear registro</a>
@endsection

@section('titulo')
    Administracion - RAM
@endsection

@section('contenido')

@if ( session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    
    <h3 class="text-center my-5">Lista de memorias RAM</h3>
    <table class="table table-hover">
        <thead>
        <tr>

            <th scope="col">#</th>
            <th scope="col">Procesador</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Registrado el</th>
            <th scope="col">Actualizado el</th>
            <th scope="col">Acciones</th>
            
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            @foreach ($registros as $registro)
                <tr>
                    <th>{{ $registro->id }}</th>
                    <th scope="row">{{ $registro->procesador }}</th>
                    <td>{{ $registro->registrado_por }}</td>
                    <td>{{ $registro->created_at }}</td>
                    <td>{{ $registro->updated_at }}</td>
                    <td>
                        <form action="{{ route('ram.destroy', $registro->procesador) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        
        </tbody>
    </table>

</div>  
@endsection