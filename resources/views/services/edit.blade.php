@extends('layouts.app')

@section('page-description', "Editar un servicio ya existente")

@section('title', "Nuevo Servicio - ADMAGA Solutions")

@section('first-container', 'container')

@section('content')
    <h1>Editar Servicio</h1>

    <form method="POST" action="{{ route('services.update', ['service' => $service->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Nombre del Servicio</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') ?? $service->title }}" required>
        </div>
        <div class="form-row">
            <label for="description">Descripción</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') ?? $service->description }}" required>
        </div>
        <div class="form-row">
            <label for="price">Precio</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') ?? $service->price }}" required>
        </div>
        <div class="form-row">
            <label for="status">Estado</label>
            <select class="form-select" name="status" required>
                <option {{ old('status') == 'unavailable' ? 'selected' : (old('status') == 'available' ? '' : ($service->status == 'unavailable' ? 'selected' : '')) }} value="unavailable">Unavailable</option>
                <option {{ old('status') == 'available' ? 'selected' : (old('status') == 'unavailable' ? '' : ($service->status == 'available' ? 'selected' : '')) }} value="available">Available</option>
            </select>
        </div>
        <div class="form-row mt-3">
            <button class="btn btn-primary btn-lg" type="submit">Editar Servicio</button>
        </div>
    </form>
@endsection