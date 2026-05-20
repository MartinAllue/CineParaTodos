@extends('layouts.app')

@section('title', 'Editar comentario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="mb-3">
                <a href="{{ route('movies.show', $review->movie_id) }}" class="btn btn-outline-light btn-sm">&larr; Volver</a>
            </div>
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0 fw-bold">Editar Comentario</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label text-danger">Título</label>
                            <input type="text" name="title" class="form-control bg-dark text-white border-secondary" value="{{ old('title', $review->title) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-danger">Contenido <span class="text-white">*</span></label>
                            <textarea name="content" rows="5" class="form-control bg-dark text-white border-secondary @error('content') is-invalid @enderror" required>{{ old('content', $review->content) }}</textarea>
                            @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('movies.show', $review->movie_id) }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning px-4 fw-semibold">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection