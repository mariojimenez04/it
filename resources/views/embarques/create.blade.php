@extends('layouts.app')

@section('botones')
    <a href="{{ route('embarque.index') }}" class="btn btn-dark">Volver</a>
@endsection 

@section('titulo')
    Embarque - Registrar nuevo embarque
@endsection

@section('contenido')
<form id="formulario" class="container" action="{{ route('embarque.store') }}" method="POST">
    @csrf
    <div class="row gap-5">

        <div class="col-sm-2">

            <label for="id_emb" class="form-label">ID embarque</label>
            <input type="text" id="id_emb" name="id_emb" class="form-control form-control-sm @error('id_emb') is-invalid @enderror" value="{{ $id_emb }}">

            @error('id_emb')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-sm-5">

            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" id="titulo" name="titulo" class="form-control form-control-sm @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}">

            @error('titulo')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-sm-5">

            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control form-control-sm @error('descripcion') is-invalid @enderror" value="{{ old('descripcion') }}">

            @error('descripcion')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <input type="submit" value="Registrar embarque" class="btn btn-dark mt-3">
</form>
@endsection
