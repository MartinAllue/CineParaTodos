@extends('layouts.app')

@section('title', 'Gestionar Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 text-white fw-bold">Gestionar Usuarios</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">&larr; Panel</a>
    </div>

    <div class="card border-0 shadow bg-dark text-white">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'secondary' }} fs-6">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                @if(!$user->isAdmin())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este usuario?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-light">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
@endsection