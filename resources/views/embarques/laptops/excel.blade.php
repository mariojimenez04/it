@extends('layouts.app')

@section('botones')
    <a href="{{ route('laptop.index', $id) }}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Importar series - {{ $id }}
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
      <p><strong>¡Importante! </strong> el nombre de el embarque debe ser el mismo al asignado de la columna O) del archivo que se va a importar</p> 
      <p><strong>¡Importante! </strong> el acomodo de los campos en el archivo debe ser de la siguiente manera:</p> 
        <div class="row row-col-2">
            <div class="col">

                <p>id detalle</p>
                <p>modelo</p>
                <p>numero serie</p>
                <p>observaciones</p>
                <p>diagnostico</p>
                <p>acciones</p>
                <p>procesador</p>

            </div>
            <div class="col">

                <p>tamano</p>
                <p>color</p>
                <p>capacidad</p>
                <p>ram</p>
                <p>cantidad</p>
                <p>status</p>
                <p>entregado</p>
                <p>id titulo</p>

            </div>
        </div>
    </div>
</div>

<form class="container" action="{{ route('laptop.import.excel', $id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-8">

            <label for="laptop_import" class="form-label">Archivo Excel</label>
            <input class="form-control" name="laptop_import" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />

            @error('laptop_import')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <input type="submit" value="Importar archivo" class="btn btn-dark mt-3">
</form>
@endsection