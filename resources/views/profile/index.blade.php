@extends('layouts.app')

@section('title', 'Perfil de ' . $user->name)

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="mb-4 text-white fw-bold">Perfil de {{ $user->name }}</h1>

            <div class="card bg-dark text-white border-danger shadow-sm mb-5" style="border-width: 2px !important;">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p><strong class="text-danger">Email:</strong> {{ $user->email }}</p>
                            <p><strong class="text-danger">Rol:</strong> <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'secondary' }} fs-6">{{ ucfirst($user->role) }}</span></p>
                            <p><strong class="text-danger">Películas creadas:</strong> {{ $user->movies->count() }}</p>
                            <p><strong class="text-danger">Valoraciones realizadas:</strong> {{ $user->ratings->count() }}</p>
                            <p><strong class="text-danger">Reseñas escritas:</strong> {{ $user->reviews->count() }}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="bg-danger rounded-circle d-inline-flex align-items-center justify-content-center shadow" style="width: 120px; height: 120px;">
                                <span class="display-4 text-white fw-bold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-danger mb-4" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-danger fw-semibold" id="created-tab" data-bs-toggle="tab" data-bs-target="#created" type="button">Películas creadas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-danger fw-semibold" id="rated-tab" data-bs-toggle="tab" data-bs-target="#rated" type="button">Valoradas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-danger fw-semibold" id="reviewed-tab" data-bs-toggle="tab" data-bs-target="#reviewed" type="button">Reseñadas</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="created">
                    @if($createdMovies->count() > 0)
                        <div class="row g-4">
                            @foreach($createdMovies as $movie)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card h-100 bg-dark text-white border-0 shadow-sm">
                                        <img src="{{ $movie->imagen_url ? asset('storage/' . $movie->imagen_url) : 'https://placehold.co/600x400/dc3545/ffffff?text=' . urlencode($movie->titulo) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $movie->titulo }}">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-danger">{{ $movie->titulo }}</h5>
                                            <p class="text-white-50 small">Nota: <span class="badge bg-warning text-dark">{{ $movie->valoracion_media ? number_format($movie->valoracion_media, 1) . ' ★' : 'Sin notas' }}</span></p>
                                            <div class="mt-auto">
                                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-danger btn-sm">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-4">{{ $createdMovies->links('pagination::bootstrap-5') }}</div>
                    @else
                        <p class="text-white-50">No has creado ninguna película.</p>
                    @endif
                </div>

                <div class="tab-pane fade" id="rated">
                    @if($ratedMovies->count() > 0)
                        <div class="row g-4">
                            @foreach($ratedMovies as $rating)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card h-100 bg-dark text-white border-0 shadow-sm">
                                        <img src="{{ $rating->movie->imagen_url ? asset('storage/' . $rating->movie->imagen_url) : 'https://placehold.co/600x400/dc3545/ffffff?text=' . urlencode($rating->movie->titulo) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $rating->movie->titulo }}">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-danger">{{ $rating->movie->titulo }}</h5>
                                            <p class="text-white-50 small">Tu valoración: <span class="badge bg-warning text-dark">&#9733; {{ $rating->score }}/5</span></p>
                                            <div class="mt-auto">
                                                <a href="{{ route('movies.show', $rating->movie->id) }}" class="btn btn-outline-danger btn-sm">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-4">{{ $ratedMovies->links('pagination::bootstrap-5') }}</div>
                    @else
                        <p class="text-white-50">No has valorado ninguna película.</p>
                    @endif
                </div>

                <div class="tab-pane fade" id="reviewed">
                    @if($reviewedMovies->count() > 0)
                        <div class="row g-4">
                            @foreach($reviewedMovies as $review)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card h-100 bg-dark text-white border-0 shadow-sm">
                                        <img src="{{ $review->movie->imagen_url ? asset('storage/' . $review->movie->imagen_url) : 'https://placehold.co/600x400/dc3545/ffffff?text=' . urlencode($review->movie->titulo) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $review->movie->titulo }}">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-danger">{{ $review->movie->titulo }}</h5>
                                            <p class="text-white-50 small">"{{ Str::limit($review->content, 80) }}"</p>
                                            <div class="mt-auto">
                                                <a href="{{ route('movies.show', $review->movie->id) }}" class="btn btn-outline-danger btn-sm">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-4">{{ $reviewedMovies->links('pagination::bootstrap-5') }}</div>
                    @else
                        <p class="text-white-50">No has reseñado ninguna película.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection