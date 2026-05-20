@extends('layouts.app')

@section('title', 'Añadir Película')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-3">
                <a href="{{ route('movies.index') }}" class="btn btn-outline-light btn-sm">&larr; Volver</a>
            </div>
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-header bg-danger text-white py-3">
                    <h4 class="mb-0">Añadir Nueva Película</h4>
                    <p class="mb-0 text-white-50 small">Completa los campos para añadir la película.</p>
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
                    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label text-danger">Título <span class="text-white">*</span></label>
                                <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control bg-dark text-white border-secondary @error('titulo') is-invalid @enderror" required>
                                @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">Director <span class="text-white">*</span></label>
                                <input type="text" name="director" value="{{ old('director') }}" class="form-control bg-dark text-white border-secondary @error('director') is-invalid @enderror" required>
                                @error('director') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">Año <span class="text-white">*</span></label>
                                <input type="number" name="anio" value="{{ old('anio') }}" class="form-control bg-dark text-white border-secondary @error('anio') is-invalid @enderror" required>
                                @error('anio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">Género <span class="text-white">*</span></label>
                                <input type="text" name="genero" value="{{ old('genero') }}" class="form-control bg-dark text-white border-secondary @error('genero') is-invalid @enderror" required>
                                @error('genero') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-danger">País <span class="text-white">*</span></label>
                                <input type="text" name="pais" value="{{ old('pais') }}" class="form-control bg-dark text-white border-secondary @error('pais') is-invalid @enderror" required>
                                @error('pais') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label text-danger">Sinopsis</label>
                                <textarea name="sinopsis" rows="4" class="form-control bg-dark text-white border-secondary @error('sinopsis') is-invalid @enderror">{{ old('sinopsis') }}</textarea>
                                @error('sinopsis') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label text-danger">Imagen</label>
                                <input type="file" name="imagen_url" accept="image/*" class="form-control bg-dark text-white border-secondary @error('imagen_url') is-invalid @enderror">
                                @error('imagen_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                <div class="form-text text-white-50">Sube una imagen (JPG, PNG o WebP, máx. 2MB).</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-secondary">
                            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-danger px-4 fw-semibold">Guardar Película</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection