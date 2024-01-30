@extends('layouts.app')

@section('page-description', 'Listado de todos los servicios existentes actualmente')

@section('title', 'Servicios - ADMAGA Solutions')

@section('first-container', 'container')

@section('content')
    <div class="py-3 text-center">
        <h1>Lista de Usuarios</h1>
    </div>
    <hr>
    @empty ($users)
        <div class="alert alert-warning">
            No hay usuarios en la aplicación
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Administrador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->admin_since)->diffForHumans() ?? 'No' }}</td>
                        <td>
                            <a class="btn btn-link" href="{{ route('profiles.history', ['user_id' => $user->id]) }}">Historial</a>
                            <form class="d-inline" method="POST" action="{{ route('users.admin.toggle', ['user' => $user->id]) }}">
                                @csrf
                                <button class="btn btn-link" type="submit">
                                    {{$user->isAdmin() ? 'Quitar' : 'Dar'}} Admin
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection