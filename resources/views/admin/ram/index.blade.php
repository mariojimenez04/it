@extends('layouts.app')

@section('botones')
    <a href="{{ route('admin.index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('ram.create') }}" class="btn btn-dark">Crear registro</a>
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
            <th scope="col">Capacidad</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Registrado el</th>
            <th scope="col">Actualizado el</th>
            <th scope="col">Acciones</th>
            
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            @foreach ($rams as $ram)
                <tr>
                    <th>{{ $ram->id }}</th>
                    <th scope="row">{{ $ram->ram }}</th>
                    <td>{{ $ram->registrado_por }}</td>
                    <td>{{ $ram->created_at }}</td>
                    <td>{{ $ram->updated_at }}</td>
                    <td>
                        <form action="{{ route('ram.destroy', $ram->ram) }}" method="POST">
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