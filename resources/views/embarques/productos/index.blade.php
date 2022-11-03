@extends('layouts.app')

@section('botones')
    <a href="{{ route('embarque.productos.index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('productos.create', $titulo->id_titulo) }}" class="btn btn-dark">Registrar Productos</a>
@endsection

@section('titulo')
    Administracion - Embarque - {{ $titulo->id_titulo }}
@endsection

@section('contenido')

@if ( session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="table-responsive">

        <table class="table table-hover">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Linea</th>
                <th scope="col">Isla</th>
                <th scope="col">Codigo</th>
                <th scope="col">Producto</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Color</th>
                <th scope="col">Cantidad</th>
                @if (auth()->user()->admin === 1 || auth()->user()->supervisor === 1 )
                    <th scope="col">Comentarios</th>
                    <th scope="col">Editado por</th>
                    <th scope="col">Ultima modificacion</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Acciones</th>
                @endif
            </thead>
            <tbody>

                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->linea }}</td>
                        <td>{{ $producto->isla }}</td>
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->producto }}</td>
                        <td>{{ $producto->marca }}</td>
                        <td>{{ $producto->modelo }}</td>
                        <td>{{ $producto->color }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        @if (auth()->user()->admin === 1 || auth()->user()->supervisor === 1 )
                            <td>{{ $producto->comentarios }}</td>
                            <td>{{ $producto->modificado_por }}</td>
                            <td>{{ $producto->updated_at }}</td>
                            <td>

                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-{{ $producto->id }}">Entregar</button>
                                <div class="modal fade" id="modal-{{ $producto->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                                <div class="modal-header">
                                                    <h3 class="modal-title text-center">Entregar {{ $producto->modelo}}</h3>
                                                </div>
        
                                                <div class="modal-body">
                                                    <form action="{{ route('productos.entrega', $producto->id) }}" method="POST">
                                                    @csrf
                                                    <div class="row gap-5">
                                                        <div class="col-sm-3">
                                                            <label for="cliente">Cliente</label>
                                                            <select name="cliente" id="cliente" class="form-select">
                                                                <option selected value="">Seleccionar</option>
                                                                @foreach ($clientes as $cliente)
                                                                    <option 
                                                                        @if ($producto->cliente === $cliente->cliente)
                                                                            @selected(true)
                                                                        @endif
                                                                    value="{{ $cliente->cliente }}">{{ $cliente->cliente }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="por_entregar">Total a entregar</label>
                                                            <input type="number" name="por_entregar" id="por_entregar" placeholder="Total a entregar" class="form-control" value="{{ old('por_entregar') }}">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Total entregado</label>
                                                            <input type="text" class="form-control" value="{{ $producto->total_entregado }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" value="Guardar cambios" class="btn btn-success">
                                                </form>
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td class="d-flex gap-3">
                                @if( auth()->user()->admin === 1 )
                                    <form action="{{ route('embarque.destroy', $producto->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Eliminar" class="btn btn-danger">
                                    </form>
                                @endif   
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection