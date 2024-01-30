@extends('layouts.app')

@section('page-description', "Editar un servicio ya existente")

@section('title', "Nuevo Servicio - ADMAGA Solutions")

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Editar Servicio</h1>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Servicio ' . $service->title . ' ('. $service->id .')') }}</div>

                <div class="card-body mx-5">
                    <form method="POST" action="{{ route('services.update', ['service' => $service->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title">Nombre del Servicio</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') ?? $service->title }}" required>
                        </div>
                        <div class="row mb-3">
                            <label for="description">Descripción</label>
                            <input class="form-control" type="text" name="description" value="{{ old('description') ?? $service->description }}" required>
                        </div>
                        <div class="row mb-3">
                            <label for="price">Precio</label>
                            <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{ old('price') ?? $service->price }}" required>
                        </div>
                        <div class="row mb-3">
                            <label for="status">Estado</label>
                            <select class="form-select" name="status" required>
                                <option {{ old('status') == 'unavailable' ? 'selected' : (old('status') == 'available' ? '' : ($service->status == 'unavailable' ? 'selected' : '')) }} value="unavailable">No Disponible</option>
                                <option {{ old('status') == 'available' ? 'selected' : (old('status') == 'unavailable' ? '' : ($service->status == 'available' ? 'selected' : '')) }} value="available">Disponible</option>
                            </select>
                        </div>
                        <div class="row mb-3 d-grid col-6 mx-auto">
                            <button class="btn btn-outline-primary btn-lg" type="submit">Editar Servicio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection