<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class GenreController extends Controller
{
    public function index()
    {
        $apiKey = env('API_RAWG');
        $response = Http::get("https://api.rawg.io/api/genres", [
            "key" => $apiKey,
        ]);

        $data = $response->json();
        // dd($data);

        $genres = $data['results'];
        return view('genres.index', compact('genres'));
    }

    public function show($slug)
    {
        $apiKey = env('API_RAWG');
        $response = Http::get("https://api.rawg.io/api/games", [
            "key" => $apiKey,
            "genres" => $slug,
        ]);

        $genres = $response->json();
        $games = $genres['results'];
        // dd($genres);

        $genreName = $genres['results'][0]['genres'][0]['name'] ?? 'Unknown Genre';

        return view('genres.show', compact('genres', 'games', 'slug', 'genreName'));
    }
}
