@extends('layouts.app')

@section('title', 'Moderar Comentarios')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 text-white fw-bold">Moderar Comentarios</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">&larr; Panel</a>
    </div>

    <div class="card border-0 shadow bg-dark text-white">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Película</th>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->user->name ?? 'Eliminado' }}</td>
                            <td>
                                <a href="{{ route('movies.show', $review->movie_id) }}" class="text-danger">{{ $review->movie->titulo ?? 'Eliminada' }}</a>
                            </td>
                            <td>{{ $review->title ?? '—' }}</td>
                            <td class="text-white-50">{{ Str::limit($review->content, 60) }}</td>
                            <td>{{ $review->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este comentario permanentemente?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-light">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $reviews->links('pagination::bootstrap-5') }}
    </div>
@endsection