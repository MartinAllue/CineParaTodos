@extends('layouts.app')

@section('title', 'Todas las reseñas')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="mb-4 text-white fw-bold">Todas las reseñas</h1>

            @if($reviews->count() > 0)
                <div class="row g-4">
                    @foreach($reviews as $review)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 bg-dark text-white border-secondary shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <strong class="text-danger">{{ $review->user->name ?? 'Usuario' }}</strong>
                                        <small class="text-white-50">{{ $review->created_at->format('d/m/Y') }}</small>
                                    </div>
                                    @if($review->title)
                                        <h6 class="fw-bold text-warning">{{ $review->title }}</h6>
                                    @endif
                                    <p class="text-white-50 small flex-grow-1">{{ Str::limit($review->content, 150) }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <a href="{{ route('movies.show', $review->movie_id) }}" class="text-decoration-none small text-danger">{{ $review->movie->titulo ?? 'Película' }}</a>
                                        <span class="badge bg-danger">{{ $review->movie->genero ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">{{ $reviews->links('pagination::bootstrap-5') }}</div>
            @else
                <p class="text-white-50">No hay reseñas todavía.</p>
            @endif
        </div>
    </div>
@endsection
