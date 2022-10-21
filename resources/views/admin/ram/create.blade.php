@extends('layouts.app')

@section('botones')
    <a href="{{ route('ram.index') }}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Administracion - Registrar RAM
@endsection

@section('contenido')
<form id="formulario" class="container" action="{{ route('ram.store') }}" method="POST">
    @csrf
    <div class="row gap-5">

        <div class="col-sm-2">

            <label for="ram" class="form-label">Tamaño</label>
            <input type="text" id="ram" name="ram" class="form-control form-control-sm @error('ram') is-invalid @enderror" value="{{ old('ram') }}">

            @error('ram')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <input type="submit" value="Registrar RAM" class="btn btn-dark mt-3">
</form>
@endsection