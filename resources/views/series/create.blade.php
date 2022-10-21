@extends('layouts.app')

@section('botones')
    <a href="{{ route('laptop.index', $titulo) }}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Importar series - {{ $titulo }}
@endsection

@section('contenido')

@foreach ($errors->all() as $error)
    <div class="alerta container mt-2">
        {{ $error }}
    </div>
@endforeach

<div class="bd-callout bd-callout-warning container">
    Para una correcta importacion de datos toma en cuenta los siguientes consideraciones:
    <div class="mt-2">
        <p><strong>¡Importante!</strong> el nombre de el embarque debe ser el mismo al asignado de la columna E) del archivo que se va a importar</p>
        <p><strong>¡Importante!</strong> el acomodo de los campos en el archivo debe ser de la siguiente manera:</p>
        <p>A) Serie</p>
        <p>B) Descripcion</p>
        <p>C) Cantidad</p>
        <p>D) Pallet</p>
        <p>E) Embarque</p>
    </div>
</div>

<form class="container" action="{{ route('serie.store', $titulo) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-8">

            <label for="serie" class="form-label">Archivo Excel</label>
            <input class="form-control" name="serie" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />

            @error('serie')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <input type="submit" value="Importar archivo" class="btn btn-dark mt-3">
</form>
@endsection