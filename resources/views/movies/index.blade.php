@extends("layouts.app")

@section('title', 'Películas')

@section('content')
    <div class="text-center mb-5 p-5 bg-danger rounded-4 shadow-lg">
        <h1 class="display-4 fw-bold text-white mb-2">Descubre nuevas películas</h1>
        <p class="text-white-50 fs-5 mb-3">Explora tus películas favoritas y las opiniones de nuestros usuarios</p>
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('movies.create') }}" class="btn btn-dark btn-lg px-4 shadow-sm mt-2">Añadir nueva película</a>
            @endif
        @endauth
    </div>

    <form method="GET" action="{{ route('movies.index') }}" class="row g-2 mb-4 p-4 bg-danger rounded-3 shadow-sm">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="Buscar por título, director o género..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="genero" class="form-select">
                <option value="">Todos los géneros</option>
                @foreach($generos as $g)
                    <option value="{{ $g }}" {{ request('genero') == $g ? 'selected' : '' }}>{{ $g }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select name="anio" class="form-select">
                <option value="">Todos los años</option>
                @foreach($anios as $a)
                    <option value="{{ $a }}" {{ request('anio') == $a ? 'selected' : '' }}>{{ $a }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-dark w-100 fw-semibold">Buscar</button>
            @if(request('search') || request('genero') || request('anio'))
                <a href="{{ route('movies.index') }}" class="btn btn-outline-light">X</a>
            @endif
        </div>
    </form>

    @if($movies->count() > 0)
        <div class="row g-4">
            @foreach($movies as $movie)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($movie->imagen_url)
                            <img src="{{ asset('storage/'.$movie->imagen_url) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $movie->titulo }}">
                        @else
                            <img src="https://placehold.co/300x200/1a1a2e/ffffff?text={{ urlencode($movie->titulo) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $movie->titulo }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $movie->titulo }}</h5>
                            <p class="card-text small mb-1">
                                <span class="badge bg-warning text-dark">{{ $movie->valoracion_media ? number_format($movie->valoracion_media, 1) . ' ★' : 'Sin notas' }}</span>
                                <span class="text-muted ms-2">| {{ $movie->genero }}</span>
                                <span class="text-muted ms-2">{{ $movie->anio }}</span>
                            </p>
                            <p class="card-text small text-muted">{{ Str::limit($movie->sinopsis ?? '', 80) }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-danger w-100">Ver más...</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $movies->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="text-center py-5 bg-danger rounded-3 shadow-sm">
            <h3 class="text-white mb-3">No hay películas que coincidan con tu búsqueda</h3>
            <p class="text-white-50 mb-4">Intenta con otros filtros</p>
            <a href="{{ route('movies.index') }}" class="btn btn-dark btn-lg">Limpiar filtros</a>
        </div>
    @endif
@endsection