<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index()
    {
        $apiKey = env('API_RAWG');
        $response = Http::get("https://api.rawg.io/api/games", [
            "key" => $apiKey,
            "page_size" => 10,
            "dates" => "2025-12-01,2026-12-31",
        ]);

        $data = $response->json();
        // dd($data);


        $games = $data['results'];
        return view('home', compact('games'));
    }
}
