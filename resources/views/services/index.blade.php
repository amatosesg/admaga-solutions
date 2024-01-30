@extends('layouts.app')

@section('page-description', 'Listado de todos los servicios existentes actualmente')

@section('title', 'Servicios - ADMAGA Solutions')

@section('content')
    <div class="py-3 text-center">
        <h1>Lista de Servicios</h1>
    </div>
    <div class="text-center">
        <a class="btn btn-success mb-3" href="{{ route('services.create') }}">Crear</a>
    </div>
    <hr>

    @empty ($services)
        <div class="alert alert-warning">
            No hay servicios disponibles
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->price }}</td>
                        <td>{{ $service->status == 'available' ? 'Disponible' : 'No disponible' }}</td>
                        <td>
                            <a class="btn btn-link" href="{{ route('services.show', ['service' => $service->id]) }}">Ver</a>
                            <a class="btn btn-link" href="{{ route('services.edit', ['service' => $service->id]) }}">Editar</a>
                            <form class="d-inline" method="POST" action="{{ route('services.destroy', ['service' => $service->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection