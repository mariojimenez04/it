@extends('layouts.app')

@section('botones')
    <a href="{{ route('admin.index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('cliente.create') }}" class="btn btn-dark">Crear registro</a>
@endsection

@section('titulo')
    Administracion - Clientes
@endsection

@section('contenido')

@if ( session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">

    <h3 class="text-center my-5">Lista de clientes</h3>
    <table class="table table-hover">
        <thead>
        <tr>

            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Registrado el</th>
            <th scope="col">Actualizado el</th>
            @if (auth()->user()->admin === 1)

                <th scope="col">Acciones</th>

            @endif

        </tr>
        </thead>
        <tbody class="table-group-divider">

            @foreach ($resultados as $cliente)
                <tr>
                    <th>{{ $cliente->id }}</th>
                    <th scope="row">{{ $cliente->cliente }}</th>
                    <td>{{ $cliente->registrado_por }}</td>
                    <td>{{ $cliente->created_at }}</td>
                    <td>{{ $cliente->updated_at }}</td>

                    @if (auth()->user()->admin === 1 || auth()->user()->supervisor === 1 )
                        <td>
                            <form action="{{ route('cliente.destroy', $cliente->cliente) }}" method="POST">
                                @csrf
                                {{-- @method('delete') --}}
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
