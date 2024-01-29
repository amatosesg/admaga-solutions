@extends('layouts.app')

@section('page-description', "Crear un nuevo servicio para su venta")

@section('title', "Nuevo Servicio - ADMAGA Solutions")

@section('first-container', 'container')

@section('content')
    <h1>Crear un nuevo Servicio</h1>

    <form method="POST" action="{{ route('services.store') }}">
        @csrf
        <div class="form-row">
            <label for="title">Nombre del Servicio</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-row">
            <label for="description">Descripción</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') }}" required>
        </div>
        <div class="form-row">
            <label for="price">Precio</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') }}" required>
        </div>
        <div class="form-row">
            <label for="status">Estado</label>
            <select class="form-select" name="status" required>
                <option value="" {{ (old('status') == 'available' || old('status') == 'unavailable') ? '' : 'selected' }} >Selecciona...</option>
                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }} >No Disponible</option>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }} >Disponible</option>
            </select>
        </div>
        <div class="form-row mt-3">
            <button class="btn btn-primary btn-lg" type="submit">Crear servicio</button>
        </div>
    </form>
@endsection