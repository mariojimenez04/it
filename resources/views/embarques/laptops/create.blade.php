@extends('layouts.app')

@section('botones')
    <a href="{{ route('laptop.index', $id_embarque)}}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Registrar laptop - Embarque - {{ $id_embarque }}
@endsection

@section('contenido')
<form id="formulario" class="container" action="{{ route('laptop.store', $id_embarque) }}" method="POST">
    @csrf
    <div class="row row-cols-2 gap-5">

        <div class="col-sm-4">

            <label for="id_detalle" class="form-label">ID</label>
            <input type="text" id="id_detalle" name="id_detalle" class="form-control form-control-sm @error('id_detalle') is-invalid @enderror" value="{{ old('id_detalle') }}">

            @error('id_detalle')
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

            <label for="diagnostico" class="form-label">Diagnostico</label>
            <input type="text" id="diagnostico" name="diagnostico" class="form-control form-control-sm @error('diagnostico') is-invalid @enderror" value="{{ old('diagnostico') }}">

            @error('diagnostico')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="acciones" class="form-label">Acciones</label>
            <input type="text" id="acciones" name="acciones" class="form-control form-control-sm @error('acciones') is-invalid @enderror" value="{{ old('acciones') }}">

            @error('acciones')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="procesador" class="form-label">Procesador</label>
            <input type="text" id="procesador" name="procesador" class="form-control form-control-sm @error('procesador') is-invalid @enderror" value="{{ old('procesador') }}">

            @error('procesador')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="tamano" class="form-label">Tamaño</label>
            <input type="text" id="tamano" name="tamano" class="form-control form-control-sm @error('tamano') is-invalid @enderror" value="{{ old('tamano') }}">

            @error('tamano')
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

            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="text" id="capacidad" name="capacidad" class="form-control form-control-sm @error('capacidad') is-invalid @enderror" value="{{ old('capacidad') }}">

            @error('capacidad')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="ram" class="form-label">Ram</label>
            <input type="text" id="ram" name="ram" class="form-control form-control-sm @error('ram') is-invalid @enderror" value="{{ old('ram') }}">

            @error('ram')
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

            <label for="status" class="form-label">Status</label>
            <input type="text" id="status" name="status" class="form-control form-control-sm @error('status') is-invalid @enderror" value="{{ old('status') }}">

            @error('status')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4">

            <label for="observaciones" class="form-label">Observaciones</label>
            <input type="text" id="observaciones" name="observaciones" class="form-control form-control-sm @error('observaciones') is-invalid @enderror" value="{{ old('observaciones') }}">

            @error('observaciones')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <input type="submit" value="Crear registro" class="btn btn-dark mt-3">
</form>
@endsection