<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>It Office Solutions</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-4">
            <div class="container-fluid">
                <h2 class="me-5">
                    <a class="navbar-brand" href="{{ route('index') }}">IT Office Solutions</a>
                </h2>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        @if (auth()->user()->supervisor === 1 && auth()->user()->admin === 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.index') }}">Administracion</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('embarque.index') }}">Embarques(Laptops)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/processors/index">Embarques(Productos)</a>
                        </li>
                            
                    </ul>
                        <li class="nav-item dropdown me-2">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('index') }}">Inicio</a></li>
                                <li><a class="dropdown-item" href="{{ route('users.edit', auth()->user()->name) }}">Editar perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-link" type="submit">Cerrar sesion</button>
                                    </form>
                                </li>
                            </ul>

                        </li>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-1 mt-2">

                    @yield('botones')
                  
                </ul>
              </div>
            </div>
          </nav>

        <div class="mt-3 container">
        </div>

        <div class="text-center my-4">
            <h2 class="fw-bold">@yield('titulo')</h2>
        </div>

    <div>
        @yield('contenido')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')
    
</body>
</html>