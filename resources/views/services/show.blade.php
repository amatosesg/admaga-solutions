@extends('layouts.app')

@section('page-description', "Mas información sobre el servicio $service->title")

@section('title', "$service->title - ADMAGA Solutions")

@section('first-container', 'container')

@section('content')
    <h1>{{ $service->title }} ({{ $service->id }})</h1>
    <p>{{ $service->description }}</p>
    <p>{{ $service->price }}</p>
    <p>{{ $service->status }}</p>
@endsection