@extends('layouts.app')

@section('page-description', "Mas información sobre el servicio $service->title")

@section('title', "$service->title - ADMAGA Solutions")

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Información del Servicio</h1>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Servicio ' . $service->title . ' ('. $service->id .')') }}</div>

                <div class="card-body mx-5">
                    <div class="row mb-3">
                        <label for="title">Nombre del Servicio</label>
                        <input class="form-control" type="text" name="title" value="{{ $service->title }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <label for="description">Descripción</label>
                        <input class="form-control" type="text" name="description" value="{{ $service->description }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <label for="price">Precio</label>
                        <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ $service->price }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <label for="status">Estado</label>
                        <input type="text" class="form-control" value="{{ $service->status == 'available' ? 'Disponible' : 'No Disponible' }}" readonly>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="col-3">
                            <a class="btn btn-outline-primary btn-lg" href="{{ route('services.edit', ['service' => $service->id]) }}">Editar</a>
                        </div>
                        <div class="col-3">
                            <form class="d-inline" method="POST" action="{{ route('services.destroy', ['service' => $service->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-lg" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection