<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{
    private string $baseUrl = 'https://api.rawg.io/api';

    private function apiKey(): string
    {
        $key = config('services.rawg.key');
        if (empty($key)) {
            throw new \RuntimeException('RAWG API key belum dikonfigurasi.');
        }
        return $key;
    }

    private function httpClient()
    {
        $client = Http::timeout(10)->retry(2, 500)->acceptJson();
        // Hanya bypass SSL di local — di production SSL tetap aktif
        if (app()->environment('local')) {
            $client = $client->withoutVerifying();
        }
        return $client;
    }

    private function fetchGames(array $params, string $cacheKey, int $ttl = 1800): \Illuminate\Support\Collection
    {
        return Cache::remember($cacheKey, $ttl, function () use ($params) {
            try {
                $response = $this->httpClient()->get($this->baseUrl . '/games', array_merge($params, [
                    'key' => $this->apiKey(),
                ]));

                if ($response->failed()) {
                    Log::warning('RAWG API failed', ['status' => $response->status()]);
                    return collect([]);
                }

                return collect($response->json('results', []))->map(fn($g) => [
                    'id'               => $g['id'] ?? null,
                    'name'             => $g['name'] ?? 'Unknown',
                    'background_image' => $g['background_image'] ?? null,
                    'rating'           => $g['rating'] ?? 0,
                    'genres'           => collect($g['genres'] ?? [])->pluck('name')->take(2)->implode(', '),
                ]);
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                Log::error('RAWG connection error (SSL/network issue)');
                return collect([]);
            } catch (\Throwable $e) {
                Log::error('RAWG unexpected error: ' . class_basename($e));
                return collect([]);
            }
        });
    }

    public function index()
    {
        // Hot games — ditampilkan di hero slider
        $hotGames = $this->fetchGames(
            params: [
                'ordering'  => '-added',
                'page_size' => 6,
                'dates'     => now()->subMonths(3)->format('Y-m-d') . ',' . now()->format('Y-m-d'),
            ],
            cacheKey: 'rawg_hot_games',
        );

        // New releases — rilis dalam 2 bulan terakhir, urut terbaru
        $newGames = $this->fetchGames(
            params: [
                'ordering'  => '-released',
                'page_size' => 12,
                'dates'     => now()->subMonths(2)->format('Y-m-d') . ',' . now()->format('Y-m-d'),
                'metacritic' => '60,100',
            ],
            cacheKey: 'rawg_new_games',
        );

        // Popular all-time — rating tinggi
        $popularGames = $this->fetchGames(
            params: [
                'ordering'   => '-rating',
                'page_size'  => 12,
                'metacritic' => '80,100',
            ],
            cacheKey: 'rawg_popular_games',
        );

        return view('home', compact('hotGames', 'newGames', 'popularGames'));
    }
}
