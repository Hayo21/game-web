<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class GameController extends Controller
{
    // untuk dikirimkan kehalama home (bagian utama dari web)
    public function index()
    {
        $apiKey = env('API_RAWG');
        $response = Http::get("https://api.rawg.io/api/games", [
            "key" => $apiKey,
            "page_size" => 15,
            "dates" => "2025-01-01,2050-12-31",
        ]);

        $data = $response->json();
        // dd($data);


        $games = $data['results'];
        return view('home', compact('games'));
    }

    // untuk dikirimkan kehalaman detail game
    public function show($id)
    {
        $apiKey = env('API_RAWG');
        $responseGame = Http::get("https://api.rawg.io/api/games/{$id}", [
            "key" => $apiKey,
        ]);
        $responseScreenshots = Http::get("https://api.rawg.io/api/games/{$id}/screenshots", [
            "key" => $apiKey,
        ]);
        $responseMovies = Http::get("https://api.rawg.io/api/games/{$id}/movies", [
            "key" => $apiKey,
        ]);


        $game = $responseGame->json();
        $screenshots = $responseScreenshots->json();
        $movies = $responseMovies->json();
        // dd($game, $screenshots, $movies);

        return view('games.show', compact('game', 'screenshots', 'movies'));
    }
}
