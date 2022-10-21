@extends('layouts.app')

@section('botones')
    <a href="{{ route('processor.index') }}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Administracion - Registrar Procesador
@endsection

@section('contenido')
<form id="formulario" class="container" action="{{ route('processor.store') }}" method="POST">
    @csrf
    <div class="row gap-5">

        <div class="col-sm-2">

            <label for="procesador" class="form-label">Procesador</label>
            <input type="text" id="procesador" name="procesador" class="form-control form-control-sm @error('procesador') is-invalid @enderror" value="{{ old('procesador') }}">

            @error('procesador')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <input type="submit" value="Registrar RAM" class="btn btn-dark mt-3">
</form>
@endsection