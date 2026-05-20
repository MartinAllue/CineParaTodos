<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Mostrar todas las valoraciones
     */
    public function index()
    {
        $ratings = Rating::with('user', 'movie')->latest()->paginate(15);
        return view('ratings.index', compact('ratings'));
    }

    public function store(Request $request, Movie $movie)
    {
        $request->validate([
            'score' => 'required|integer|min:1|max:5',
        ]);

        $user = auth()->user();

        try {
            // Intentamos buscar valoración existente
            $rating = Rating::firstOrNew([
                'user_id' => $user->id,
                'movie_id' => $movie->id,
            ]);

            $rating->score = $request->score;
            $rating->save();

            // Actualizamos promedio de la película
            $movie->updateAverageRating();

            $response = [
                'success' => true,
                'average' => $movie->valoracion_media,
                'total' => $movie->ratings()->count(),
                'user_score' => $rating->score,
                'message' => $rating->wasRecentlyCreated ? 'Valoración agregada' : 'Valoración actualizada',
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('success', $response['message']);

        } catch (\Illuminate\Database\QueryException $e) {
            // Manejo de errores de duplicados u otros errores
            return back()->with('error', 'Error al guardar la valoración. Inténtalo de nuevo.');
        }
    }
}
