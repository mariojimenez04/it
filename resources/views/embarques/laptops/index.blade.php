@extends('layouts.app')

@section('botones')
    <a href="{{ route('embarque.index') }}" class="btn btn-dark">Volver</a>
    <a href="{{ route('laptop.create', $id) }}" class="btn btn-dark">Registrar laptop</a>
    <a href="{{ route('laptop.import', $id) }}" class="btn btn-primary">Importar archivo Excel Laptops</a>
    <a href="{{ route('serie.create', $id) }}" class="btn btn-dark">Importar Excel No. series</a>
    <a href="{{ route('serie.index', $id) }}" class="btn btn-dark">Ver No. series</a>
    <a href="{{ route('laptop.excel', $id) }}" class="btn btn-success">Descargar en Excel</a>
@endsection

@section('titulo')
    Detalle de embarque - {{ $id }}
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
        <tr>
            <th scope="col">#</th>
            <th scope="col">Modelo</th>
            <th scope="col">Numero serie</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Diagnostico</th>
            <th scope="col">Acciones IT</th>
            <th scope="col">Procesador</th>
            <th scope="col">Tamaño</th>
            <th scope="col">Color</th>
            <th scope="col">Capacidad</th>
            <th scope="col">RAM</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Condicion</th>
            <th scope="col">Status</th>
            <th scope="col">Pallet</th>
            @if(auth()->user()->admin === 1)
                <th scope="col">Modificado Por</th>
                <th scope="col">Ultima modificacion</th>
                <th scope="col">Acciones</th>
            @endif
        </tr>
        </thead>
        <tbody class="table-group-divider">
    
            @foreach ($detalle_laptops as $detalle)
                <tr>
    
                    <th>{{ $detalle->id_detalle }}</th>
                    <th>{{ $detalle->modelo }}</th>
                    <td>{{ $detalle->numero_serie }}</td>
                    <td>{{ $detalle->observaciones }}</td>
                    <td>{{ $detalle->diagnostico }}</td>
                    <td>{{ $detalle->acciones }}</td>
                    <td>{{ $detalle->procesador }}</td>
                    <td>{{ $detalle->tamano }}</td>
                    <td>{{ $detalle->color }}</td>
                    <td>{{ $detalle->capacidad }}</td>
                    <td>{{ $detalle->ram }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->condicion }}</td>
                    <td>
                        @if ($detalle->entregado === 0)
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-{{ $detalle->id_detalle }}">No entregado</button>
                        @else
                            <button class="btn btn-success" disabled>Entregado</button>
                        @endif
                        <div class="modal fade" id="modal-{{ $detalle->id_detalle }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-center">Entregar {{ $detalle->id_detalle}}</h3>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="cliente">Cliente</label>
                                                    <select name="cliente" id="cliente" class="form-select">
                                                        <option>--Seleccionar--</option>
                                                        <option value="1">Rafa</option>
                                                        <option value="2">Roldan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="submit" value="Guardar cambios" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $detalle->pallet }}</td>
                    @if (auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                    <td>{{ $detalle->modificado_por }}</td>
                    <td>{{ $detalle->updated_at }}</td>
                    <form action="{{ route('laptop.destroy', $detalle->numero_serie) }}" method="POST">
                        @csrf
                        @method('delete')
                            <td class="row gap-2">
                                <a href="{{ route('laptop.edit', $detalle->numero_serie) }}" class="btn btn-warning">Editar</a>
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </td>
                    </form>
                    @endif
                    

                </tr>
            @endforeach
        
        </tbody>
    </table>
</div>

@endsection