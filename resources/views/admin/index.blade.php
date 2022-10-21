@extends('layouts.app')

@section('botones')
    <a href="{{ route('index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('ram.index') }}" class="btn btn-dark">Ver lista de memoria Ram</a>
    @if (auth()->user()->admin === 1)

        <a href="{{ route('users.index') }}" class="btn btn-primary">Ver usuarios</a>
        
    @endif
    <a href="{{ route('processor.index') }}" class="btn btn-dark">Ver procesadores</a>

@endsection

@section('titulo')
    Administracion
@endsection

@section('contenido')

<div class="table-responsive container">
    <h3 class="text-center my-5">Lista de memorias RAM</h3>
    <table class="table table-hover">
        <thead>
        <tr>

            <th scope="col">#</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Registrado por</th>
            
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            @foreach ($rams as $ram)
                <tr>
                    <th>{{ $ram->id }}</th>
                    <th scope="row">{{ $ram->ram }}</th>
                    <th scope="row">{{ $ram->registrado_por }}</th>
                </tr>
            @endforeach
        
        </tbody>
    </table>
<a href="{{ route('ram.index') }}" class="btn btn-success mb-4">Ver mas</a>
</div>  

<div class="linea"></div>

<div class="table-responsive">
    <h3 class="text-center my-5">Lista de colores</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Color</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Registrado el</th>
            <th scope="col">Actualizado el</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            {{-- @foreach ($series as $serie)
                <tr>
                    <th>{{ $serie->id }}</th>
                    <th scope="row">{{ $serie->serie }}</th>
                    <td>{{ $serie->descripcion }}</td>
                    <td>{{ $serie->cantidad }}</td>
                    <td>{{ $serie->palet }}</td>
                    <td>{{ $serie->registrado_por }}</td>
                    <td>{{ $serie->created_at }}</td>
                    <td>{{ $serie->updated_at }}</td>
                    <td>
                        <form action="">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        
        </tbody>
    </table>

</div>   

<div class="linea"></div>

<div class="table-responsive">
    <h3 class="text-center my-5">Lista de procesadores</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Procesador</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Registrado el</th>
            <th scope="col">Actualizado el</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            {{-- @foreach ($series as $serie)
                <tr>
                    <th>{{ $serie->id }}</th>
                    <th scope="row">{{ $serie->serie }}</th>
                    <td>{{ $serie->descripcion }}</td>
                    <td>{{ $serie->cantidad }}</td>
                    <td>{{ $serie->palet }}</td>
                    <td>{{ $serie->registrado_por }}</td>
                    <td>{{ $serie->created_at }}</td>
                    <td>{{ $serie->updated_at }}</td>
                    <td>
                        <form action="">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        
        </tbody>
    </table>

</div>   

<div class="linea"></div>

<div class="table-responsive">
    <h3 class="text-center my-5">Lista de memoria(tamaño)</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tamaño</th>
            <th scope="col">Registrado por</th>
            <th scope="col">Registrado el</th>
            <th scope="col">Actualizado el</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            {{-- @foreach ($series as $serie)
                <tr>
                    <th>{{ $serie->id }}</th>
                    <th scope="row">{{ $serie->serie }}</th>
                    <td>{{ $serie->descripcion }}</td>
                    <td>{{ $serie->cantidad }}</td>
                    <td>{{ $serie->palet }}</td>
                    <td>{{ $serie->registrado_por }}</td>
                    <td>{{ $serie->created_at }}</td>
                    <td>{{ $serie->updated_at }}</td>
                    <td>
                        <form action="">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        
        </tbody>
    </table>

</div>   

@endsection