@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 text-white fw-bold">Panel de Administración</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-danger shadow-sm">Añadir Película</a>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card bg-danger text-white text-center border-0 shadow">
                <div class="card-body py-4">
                    <h3 class="display-6">{{ $totalMovies }}</h3>
                    <p class="mb-0 fw-semibold">Películas</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white text-center border-0 shadow">
                <div class="card-body py-4">
                    <h3 class="display-6">{{ $totalUsers }}</h3>
                    <p class="mb-0 fw-semibold">Usuarios</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark text-center border-0 shadow">
                <div class="card-body py-4">
                    <h3 class="display-6">{{ $totalReviews }}</h3>
                    <p class="mb-0 fw-semibold">Comentarios</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                <div class="card border-danger border-2 shadow-sm h-100 bg-dark text-white">
                    <div class="card-body text-center py-5">
                        <h4 class="text-danger">Gestionar Usuarios</h4>
                        <p class="text-white-50 mb-0">RF-13: Administrar usuarios registrados</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('admin.reviews') }}" class="text-decoration-none">
                <div class="card border-danger border-2 shadow-sm h-100 bg-dark text-white">
                    <div class="card-body text-center py-5">
                        <h4 class="text-danger">Moderar Comentarios</h4>
                        <p class="text-white-50 mb-0">RF-14: Moderar valoraciones y comentarios</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection