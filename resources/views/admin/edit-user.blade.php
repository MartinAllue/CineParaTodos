@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="mb-3">
                <a href="{{ route('admin.users') }}" class="btn btn-outline-light btn-sm">&larr; Volver</a>
            </div>
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-header bg-danger text-white py-3">
                    <h4 class="mb-0">Editar Usuario: {{ $user->name }}</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label text-danger">Nombre</label>
                            <input type="text" name="name" class="form-control bg-dark text-white border-secondary" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-danger">Email</label>
                            <input type="email" name="email" class="form-control bg-dark text-white border-secondary" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-danger">Rol</label>
                            <select name="role" class="form-select bg-dark text-white border-secondary">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger px-4 fw-semibold">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection