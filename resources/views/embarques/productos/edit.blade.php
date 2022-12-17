@extends('layouts.app')

@section('botones')
    <a href="{{ route('productos.index', $producto->id_titulo)}}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Editar Producto - {{ $producto->modelo }} - Embarque - {{ $producto->id_titulo }}
@endsection

@section('contenido')
<form id="formulario" class="container" action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    <div class="row row-cols-2 gap-5">

        <div class="col-sm-4">

            <label for="linea" class="form-label">Linea</label>

            <select name="linea" id="linea" class="form-select">

                <option value="" selected>--Seleccionar--</option>

                @foreach ($lineas as $linea)
                    <option
                    value="{{ $linea->linea }}"
                    {{-- @php
                        $producto->linea === $linea->linea ? 'selected' : ''
                    @endphp --}}
                    >{{ $linea->linea }}</option>
                @endforeach

            </select>

            @error('linea')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

        </div>

        <div class="col-md-4">

            <label for="isla" class="form-label">Isla</label>
            <input type="text" id="isla" name="isla" class="form-control form-control-sm @error('isla') is-invalid @enderror" value="{{ $producto->isla }}">

            @error('isla')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" id="codigo" name="codigo" class="form-control form-control-sm @error('codigo') is-invalid @enderror" value="{{ $producto->codigo }}">

        </div>

        <div class="col-md-4">

            <label for="producto" class="form-label">Producto</label>
            <input type="text" id="producto" name="producto" class="form-control form-control-sm" value="{{ $producto->producto }}">

            @error('producto')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="marca" class="form-label">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control form-control-sm @error('marca') is-invalid @enderror" value="{{ $producto->marca }}">

            @error('marca')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control form-control-sm @error('modelo') is-invalid @enderror" value="{{ $producto->modelo }}">

            @error('modelo')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="color" class="form-label">Color</label>
            <input type="text" id="color" name="color" class="form-control form-control-sm @error('color') is-invalid @enderror" value="{{ $producto->color }}">

            @error('color')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" id="cantidad" name="cantidad" class="form-control form-control-sm @error('cantidad') is-invalid @enderror" value="{{ $producto->cantidad }}">

            @error('cantidad')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="comentarios" class="form-label">Comentarios</label>
            <input type="text" id="comentarios" name="comentarios" class="form-control form-control-sm" value="{{ $producto->comentarios }}">

        </div>

    </div>

    <input type="submit" value="Actualizar registro" class="btn btn-dark my-3">
</form>
@endsection