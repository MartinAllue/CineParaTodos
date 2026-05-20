@extends('layouts.app')

@section('title', 'Editar película')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-3">
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-light btn-sm">&larr; Volver</a>
            </div>
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0 fw-bold">Editar Película</h4>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mb-0 rounded-0">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body p-4">
                    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label text-danger">Título <span class="text-white">*</span></label>
                                <input type="text" name="titulo" class="form-control bg-dark text-white border-secondary" value="{{ old('titulo', $movie->titulo) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">Director</label>
                                <input type="text" name="director" class="form-control bg-dark text-white border-secondary" value="{{ old('director', $movie->director) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">Año</label>
                                <input type="number" name="anio" class="form-control bg-dark text-white border-secondary" value="{{ old('anio', $movie->anio) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">Género</label>
                                <input type="text" name="genero" class="form-control bg-dark text-white border-secondary" value="{{ old('genero', $movie->genero) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">País</label>
                                <input type="text" name="pais" class="form-control bg-dark text-white border-secondary" value="{{ old('pais', $movie->pais) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label text-danger">Sinopsis</label>
                                <textarea name="sinopsis" class="form-control bg-dark text-white border-secondary" rows="4">{{ old('sinopsis', $movie->sinopsis) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-danger">Imagen actual</label><br>
                                @if($movie->imagen_url)
                                    <img src="{{ asset('storage/'.$movie->imagen_url) }}" class="img-thumbnail mb-2 border-secondary" style="max-width: 200px;">
                                @else
                                    <p class="text-white-50">No hay imagen.</p>
                                @endif
                            </div>

                            <div class="col-12">
                                <label class="form-label text-danger">Cambiar imagen (opcional)</label>
                                <input type="file" name="imagen_url" class="form-control bg-dark text-white border-secondary">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-secondary">
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-warning px-4 fw-semibold">Actualizar Película</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection