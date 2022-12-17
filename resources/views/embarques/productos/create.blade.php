@extends('layouts.app')

@section('botones')
    <a href="{{ route('productos.index', $id_titulo->id_emb)}}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Registrar Producto - Embarque - {{ $id_titulo->id_emb }}
@endsection

@section('contenido')
<form class="container" action="{{ route('productos.store', $id_titulo->id_emb) }}" method="POST">
    @csrf
    <div class="row row-cols-2 gap-5">

        <div class="col-sm-4">

            <label for="linea" class="form-label">Linea</label>
            <select name="linea" id="linea" class="form-select">
                <option value="" selected>--Seleccionar--</option>

                @foreach ($lineas as $linea)
                    <option value="{{ $linea->linea }}">{{ $linea->linea }}</option>
                @endforeach

            </select>

            @error('linea')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="isla" class="form-label">Isla</label>
            <input type="text" id="isla" name="isla" class="form-control form-control-sm @error('isla') is-invalid @enderror" value="{{ old('isla') }}">

            @error('isla')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" id="codigo" name="codigo" class="form-control form-control-sm @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}">

        </div>

        <div class="col-md-4">

            <label for="producto" class="form-label">Producto</label>
            <input type="text" id="producto" name="producto" class="form-control form-control-sm" value="{{ old('producto') }}">

            @error('producto')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="marca" class="form-label">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control form-control-sm @error('marca') is-invalid @enderror" value="{{ old('marca') }}">

            @error('marca')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control form-control-sm @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}">

            @error('modelo')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="numero_serie" class="form-label">Numero de serie</label>
            <input type="text" id="numero_serie" name="numero_serie" class="form-control form-control-sm @error('numero_serie') is-invalid @enderror" value="{{ old('numero_serie') }}">

            @error('numero_serie')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="color" class="form-label">Color</label>
            <input type="text" id="color" name="color" class="form-control form-control-sm @error('color') is-invalid @enderror" value="{{ old('color') }}">

            @error('color')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="text" id="cantidad" name="cantidad" class="form-control form-control-sm @error('cantidad') is-invalid @enderror" value="{{ old('cantidad') }}">

            @error('cantidad')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="comentarios" class="form-label">Comentarios</label>
            <input type="text" id="comentarios" name="comentarios" class="form-control form-control-sm" value="{{ old('comentarios') }}">

        </div>

    </div>

    <input type="submit" value="Crear registro" class="btn btn-dark my-3">
</form>
@endsection