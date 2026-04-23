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
}
