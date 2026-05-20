@extends('layouts.app')

@section('title', 'Todas las valoraciones')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="mb-4 text-white fw-bold">Todas las valoraciones</h1>

            @if($ratings->count() > 0)
                <div class="row g-4">
                    @foreach($ratings as $rating)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 bg-dark text-white border-secondary shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <strong class="text-danger">{{ $rating->user->name ?? 'Usuario' }}</strong>
                                        <span class="badge bg-warning text-dark fs-6">&#9733; {{ $rating->score }}/5</span>
                                    </div>
                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <a href="{{ route('movies.show', $rating->movie_id) }}" class="text-decoration-none small text-danger">{{ $rating->movie->titulo ?? 'Película' }}</a>
                                        <small class="text-white-50">{{ $rating->created_at->format('d/m/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">{{ $ratings->links('pagination::bootstrap-5') }}</div>
            @else
                <p class="text-white-50">No hay valoraciones todavía.</p>
            @endif
        </div>
    </div>
@endsection
