@extends('layouts.app')

@section('botones')
    <a href="{{ route('admin.index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('ram.create') }}" class="btn btn-dark">Crear registro</a>
@endsection

@section('titulo')
    Administracion - Marcas
@endsection

@section('contenido')

@if ( session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">

    <h3 class="text-center my-5">Lista de marcas</h3>
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

            @foreach ($resultados as $marca)
                <tr>
                    <th>{{ $marca->id }}</th>
                    <th scope="row">{{ $marca->marca }}</th>
                    <td>{{ $marca->modificado_por }}</td>
                    <td>{{ $marca->created_at }}</td>
                    <td>{{ $marca->updated_at }}</td>

                    @if (auth()->user()->admin === 1 || auth()->user()->supervisor === 1 )
                        <td>
                            <form action="{{ route('marca.destroy', $marca->marca) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </form>
                        </td>
                    @endif

                </tr>
            @endforeach

        </tbody>
    </table>

</div>
@endsection
