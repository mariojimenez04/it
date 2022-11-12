@extends('layouts.app')

@section('botones')
    <a href="{{ route('admin.index') }}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Administracion - Registrar cliente
@endsection

@section('contenido')
<form id="formulario" class="container" action="{{ route('cliente.store') }}" method="POST">
    @csrf
    <div class="row gap-5">

        <div class="col-sm-2">

            <label for="cliente" class="form-label">Nombre cliente</label>
            <input type="text" id="cliente" name="cliente" class="form-control form-control-sm @error('cliente') is-invalid @enderror" value="{{ old('cliente') }}">

            @error('cliente')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <input type="submit" value="Registrar cliente" class="btn btn-dark my-3">
</form>
@endsection