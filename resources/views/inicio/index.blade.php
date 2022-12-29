@extends('layouts.app')

@section('titulo')
    Panel de inicio
@endsection

@section('contenido')

<main class="container">
    <div class="row align-items-center gap-3">

        <div class="col-md-3 p-0  shadow-lg">
            <div class="card p-4">
                <img src="{{ asset('iconos/journals.svg') }}">
                <div class="card-body">
                    <h4 class="card-title text-center">Administracion</h5>
                    <a href="{{ route('admin.index') }}" class="btn btn-primary">Ver mas</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-0  shadow-lg">
            <div class="card p-4">
                <img src="{{ asset('iconos/laptop.svg') }}">
                <div class="card-body">
                    <h4 class="card-title text-center">Embarque Laptops</h4>
                    <a href="{{ route('embarque.index') }}" class="btn btn-primary">Ver mas</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-0  shadow-lg">
            <div class="card p-4">
                <img src="{{ asset('iconos/box-seam.svg') }}">
                <div class="card-body">
                    <h4 class="card-title text-center">Embarque productos</h4>
                    <a href="{{ route('embarque.productos.index') }}" class="btn btn-primary">Ver mas</a>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection
