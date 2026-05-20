<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    /**
     * Mostrar todas las reseñas
     */
    public function index()
    {
        $reviews = Review::with('user', 'movie')->latest()->paginate(12);
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show form to edit a review
     */
    public function edit(Review $review)
    {
        if ($review->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }
        return view('reviews.edit', compact('review'));
    }

    /**
     * Guardar un nuevo comentario
     */
    public function store(StoreReviewRequest $request, Movie $movie)
    {
        // Verifico si ya existe review del usuario para esta película
        $validated = $request->validated();
        $userId = Auth::id();

        \Illuminate\Support\Facades\Log::debug('ReviewController@store called', [
            'user_id' => $userId,
            'movie_id' => $movie->id,
            'movie_exists' => Movie::where('id', $movie->id)->exists(),
            'user_exists' => \App\Models\User::where('id', $userId)->exists(),
            'validated' => $validated,
        ]);

        try {
            $review = Review::updateOrCreate(
                [
                    'user_id' => $userId,
                    'movie_id' => $movie->id,
                ],
                $validated
            );

            \Illuminate\Support\Facades\Log::debug('Review saved successfully', [
                'review_id' => $review->id,
                'title' => $review->title,
                'content_length' => strlen($review->content ?? ''),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Review save failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('movies.show', $movie->id)
                ->with('error', 'Error al guardar el comentario: ' . $e->getMessage());
        }

        return redirect()->route('movies.show', $movie->id)
            ->with('success', 'Tu comentario ha sido guardado.');
    }

    /**
     * Editar un comentario
     */
    public function update(Request $request, Review $review)
    {
        // Solo el creador o admin puede editar
        if ($review->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403, 'No tienes permisos para editar este comentario.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $review->update($request->only(['title', 'content']));

        return redirect()->route('movies.show', $review->movie_id)
            ->with('success', 'Comentario actualizado.');
    }

    /**
     * Eliminar un comentario
     */
    public function destroy(Review $review)
    {
        // Solo el creador o admin puede eliminar
        if ($review->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403, 'No tienes permisos para eliminar este comentario.');
        }

        $movieId = $review->movie_id;
        $review->delete();

        return redirect()->route('movies.show', $movieId)
            ->with('success', 'Comentario eliminado.');
    }
}
