@extends('layouts.app')

@section('botones')
    <a href="{{ route('embarque.index') }}" class="btn btn-dark">Volver</a>
    @if ( auth()->user()->usuario === 1)
        
        <a href="{{ route('laptop.create', $id) }}" class="btn btn-dark">Registrar laptop</a>

    @endif
    @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
        <a href="{{ route('laptop.import', $id) }}" class="btn btn-primary">Importar archivo Excel Laptops</a>
        <a href="{{ route('serie.create', $id) }}" class="btn btn-dark">Importar Excel No. series</a>
        <a href="{{ route('serie.index', $id) }}" class="btn btn-dark">Ver No. series</a>
        <a href="{{ route('laptop.excel', $id) }}" class="btn btn-success">Descargar en Excel</a>
    @endif
@endsection

@section('titulo')
    Detalle de embarque - {{ $id }}
@endsection

@section('contenido')

@if (auth()->user()->admin === 1 || auth()->user()->supervisor === 1 || auth()->user()->usuario === 1)

    <div class="container d-flex gap-3">
        <p>Laptops por entregar: <strong>{{ $no_vendido }}</strong></p>
        <p>Laptops entregadas: <strong>{{ $vendido }}</strong></p>
    </div>
    
@endif

@if ( session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<nav class="my-5">
    <div class="nav nav-tabs" id="nav" role="tablist">
        <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-home" aria-selected="true">General</button>
        <button class="nav-link " id="nav-entregados-tab" data-bs-toggle="tab" data-bs-target="#nav-entregados" type="button" role="tab" aria-controls="nav-entregados" aria-selected="true">Entregados</button>
        <button class="nav-link " id="nav-noentregados-tab" data-bs-toggle="tab" data-bs-target="#nav-noentregados" type="button" role="tab" aria-controls="nav-noentregados" aria-selected="true">No entregados</button>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    
    <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab" tabindex="0">
        
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
        
                    @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                        <th scope="col">Status</th>
                    @endif
        
                    <th scope="col">Pallet</th>
        
                    @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                        <th scope="col">Modificado Por</th>
                        <th scope="col">Ultima modificacion</th>
                        <th scope="col">Acciones</th>
                    @endif
                </tr>
                </thead>
                <tbody class="table-group-divider">
            
                    @foreach ($laptop_general as $detalle)
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
        
                            @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                            <td>
                                @if ($detalle->entregado === 0)
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-general-{{ $detalle->id_detalle }}">No entregado</button>
                                    <div class="modal fade" id="modal-general-{{ $detalle->id_detalle }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header">
                                                    <h3 class="modal-title text-center">Entregar {{ $detalle->id_detalle}}</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                </div>
        
                                                <div class="modal-body">
                                                    <form action="{{ route('laptop.venta', $detalle->id_detalle) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label for="cliente">Cliente</label>
                                                            <select name="cliente" id="cliente" class="form-select">
                                                                <option value="" selected>--Seleccionar--</option>
    
                                                                @foreach ($clientes as $cliente)
                                                                    <option value="{{ $cliente->cliente }}">{{ $cliente->cliente }}</option>
                                                                @endforeach
    
                                                            </select>
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
                                @else
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-general-dev-{{ $detalle->id_detalle }}">Entregado(Devolver)</button>
                                    <div class="modal fade" id="modal-general-dev-{{ $detalle->id_detalle }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
            
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center">Devolver {{ $detalle->id_detalle}}</h3>
                                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                    </div>
            
                                                    <div class="modal-body">
                                                        <form action="{{ route('laptop.devolucion', $detalle->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label for="motivo">Motivo de devolucion</label>
                                                                <textarea name="motivo" id="motivo" class="form-control @error('motivo') is-invalid @enderror"></textarea>
                                                                @error('motivo')
                                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                                @enderror
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
                                @endif
                            </td>
                            @endif
        
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

    </div>

    <div class="tab-pane fade" id="nav-entregados" role="tabpanel" aria-labelledby="nav-entregados-tab" tabindex="0">

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
        
                    @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                        <th scope="col">Status</th>
                    @endif
        
                    <th scope="col">Pallet</th>
        
                    @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                        <th scope="col">Modificado Por</th>
                        <th scope="col">Ultima modificacion</th>
                        <th scope="col">Acciones</th>
                    @endif
                </tr>
                </thead>
                <tbody class="table-group-divider">
            
                    @foreach ($laptop_entregadas as $detalle)
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
        
                            @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                            <td>
                                @if ($detalle->entregado === 0)
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-{{ $detalle->id_detalle }}">No entregado</button>
                                    <div class="modal fade" id="modal-{{ $detalle->id_detalle }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
            
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center">Entregar {{ $detalle->id_detalle}}</h3>
                                                        <button class="btn-close" aria-label="close"></button>
                                                    </div>
            
                                                    <div class="modal-body">
                                                        <form action="{{ route('laptop.venta', $detalle->id_detalle) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="cliente">Cliente</label>
                                                                <select name="cliente" id="cliente" class="form-select">
                                                                    <option value="" selected>--Seleccionar--</option>
        
                                                                    @foreach ($clientes as $cliente)
                                                                        <option value="{{ $cliente->cliente }}">{{ $cliente->cliente }}</option>
                                                                    @endforeach
        
                                                                </select>
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
                                @else
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-dev-{{ $detalle->id_detalle }}">Entregado(Devolver)</button>
                                    <div class="modal fade" id="modal-dev-{{ $detalle->id_detalle }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
            
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center">Devolver {{ $detalle->id_detalle}}</h3>
                                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                    </div>
            
                                                    <div class="modal-body">
                                                        <form action="{{ route('laptop.devolucion', $detalle->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label for="motivo">Motivo de devolucion</label>
                                                                <textarea name="motivo" id="motivo" class="form-control @error('motivo') is-invalid @enderror"></textarea>
                                                                @error('motivo')
                                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                                @enderror
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
                                @endif
                            </td>
                            @endif
        
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
        
    </div>

    <div class="tab-pane fade" id="nav-noentregados" role="tabpanel" aria-labelledby="nav-noentregados-tab" tabindex="0">

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
        
                    @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                        <th scope="col">Status</th>
                    @endif
        
                    <th scope="col">Pallet</th>
        
                    @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                        <th scope="col">Modificado Por</th>
                        <th scope="col">Ultima modificacion</th>
                        <th scope="col">Acciones</th>
                    @endif
                </tr>
                </thead>
                <tbody class="table-group-divider">
            
                    @foreach ($laptop_noEntregadas as $detalle)
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
        
                            @if(auth()->user()->admin === 1 || auth()->user()->supervisor === 1)
                            <td>
                                @if ($detalle->entregado === 0)
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-{{ $detalle->id_detalle }}">No entregado</button>
                                    <div class="modal fade" id="modal-{{ $detalle->id_detalle }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
            
                                                <div class="modal-header">
                                                    <h3 class="modal-title text-center">Entregar {{ $detalle->id_detalle}}</h3>
                                                    <button type="button" class="btn-close" aria-label="close"></button>
                                                </div>
        
                                                <div class="modal-body">
                                                    <form action="{{ route('laptop.venta', $detalle->id_detalle) }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label for="cliente">Cliente</label>
                                                            <select name="cliente" id="cliente" class="form-select">
                                                                <option value="" selected>--Seleccionar--</option>
    
                                                                @foreach ($clientes as $cliente)
                                                                    <option value="{{ $cliente->cliente }}">{{ $cliente->cliente }}</option>
                                                                @endforeach
    
                                                            </select>
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
                                @else
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-dev-{{ $detalle->id_detalle }}">Entregado(Devolver)</button>
                                    <div class="modal fade" id="modal-dev-{{ $detalle->id_detalle }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                
            
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center">Devolver {{ $detalle->id_detalle}}</h3>
                                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                    </div>
            
                                                    <div class="modal-body">
                                                        <form action="{{ route('laptop.devolucion', $detalle->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label for="motivo">Motivo de devolucion</label>
                                                                <textarea name="motivo" id="motivo" class="form-control @error('motivo') is-invalid @enderror"></textarea>
                                                                @error('motivo')
                                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                                @enderror
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
                                @endif
                            </td>
                            @endif
        
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
        
    </div>

</div>



@endsection