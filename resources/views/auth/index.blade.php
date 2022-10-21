@extends('layouts.app')

@section('botones')
    <a href="{{ route('admin.index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('users.create') }}" class="btn btn-dark">Registrar Usuario</a>
@endsection

@section('titulo')
    Administracion - Usuarios
@endsection

@section('contenido')
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Usuario</th>
        <th scope="col">Email</th>
        <th scope="col">Modificado por</th>
        @if (auth()->user()->admin === 1)
            <th scope="col">Acciones</th>
        @endif
    </tr>
    </thead>
    <tbody class="table-group-divider">

        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td scope="row">{{ $usuario->name }}</td>
                <td scope="row">{{ $usuario->email }}</td>
                <td>{{ $usuario->registrado_por }}</td>
                @if (auth()->user()->admin === 1)
                    <td class="d-flex gap-3">

                        <form action="{{ route('users.destroy', $usuario) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                        <a href="{{ route('users.edit', $usuario) }}" class="btn btn-warning">                                                     
                            Editar usuario
                        </a>
                        
                    </td>
                @endif
            </tr>
        @endforeach
    
    </tbody>
</table>
@endsection