<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IT Office Solutions </title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/build/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        
        <div class="login">
            <div>
                <a href="/" class="text-center"><h1>It Office Solutions</h1></a>
                
                <div class="login-contenedor">
                    <div class="login-contenido">
            
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="login-descripcion d-flex">
                                <span><i class="bi bi-envelope"></i></span>
                                <input name="email" id="email" type="email" class="@error('email') is-invalid @enderror" placeholder="Correo Electronico">
                            </div><!--Cierre usuario-->

                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            
                            <div class="login-descripcion d-flex">
                                <span><i class="bi bi-key-fill"></i></span>
                                <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" placeholder="Contraseña">
                            </div><!--cierre password-->

                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            
                            @if ( session('mensaje'))
                            <p class="text-danger">{{ session('mensaje') }}</p>
                            @endif

                            <button class="boton-1" type="submit">Iniciar sesion</button>
                        </form><!--cierre formulario-->
            
                    </div><!--cierre contenido login-->
                </div>
            </div>
        </div>
        
    </body>
</html>
