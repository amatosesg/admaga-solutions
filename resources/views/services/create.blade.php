@extends('layouts.app')

@section('page-description', "Crear un nuevo servicio para su venta")

@section('title', "Nuevo Servicio - ADMAGA Solutions")

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Crear un Nuevo Servicio</h1>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Servicio') }}</div>

                <div class="card-body mx-5">
                    <form method="POST" action="{{ route('services.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="title">Nombre del Servicio</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="row mb-3">
                            <label for="description">Descripción</label>
                            <input class="form-control" type="text" name="description" value="{{ old('description') }}" required>
                        </div>
                        <div class="row mb-3">
                            <label for="price">Precio</label>
                            <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') }}" required>
                        </div>
                        <div class="row mb-3">
                            <label for="status">Estado</label>
                            <select class="form-select" name="status" required>
                                <option value="" {{ (old('status') == 'available' || old('status') == 'unavailable') ? '' : 'selected' }} >Selecciona...</option>
                                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }} >No Disponible</option>
                                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }} >Disponible</option>
                            </select>
                        </div>
                        <div class="row mb-3 d-grid col-6 mx-auto">
                            <button class="btn btn-primary btn-lg" type="submit">Crear servicio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection