@extends('layouts.app')

@section('botones')
    <a href="{{ route('users.index') }}" class="btn btn-dark">Volver</a>
@endsection

@section('titulo')
    Registrar usuario
@endsection

@section('contenido')
    <form id="formulario" class="container" action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row gap-5">

            <div class="col-sm-5">

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email') }}">

                @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-sm-5">

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror">

                @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-sm-5">

                <label for="password_confirmation" class="form-label">Confirmar password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror">

                @error('password_confirmation')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-12">

                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" class="form-control form-control-sm @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">

                @error('nombre')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            
        </div>
        <input id="register" type="submit" class="btn btn-dark my-3" value="Registrar">
    </form>
@endsection 

@section('scripts')
    <script src="{{ asset('js/validate_users.js') }}"></script>
@endsection