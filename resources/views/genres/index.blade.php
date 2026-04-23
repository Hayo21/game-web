<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Games Genres</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #3747d1;
            color: white;
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            text-align: center;
            padding: 3rem 1rem 1.5rem;
        }

        .page-header h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.5rem, 8vw, 5rem);
            letter-spacing: 4px;
            margin: 0;
            line-height: 1;
        }

        .page-header p {
            font-size: 0.95rem;
            opacity: 0.65;
            margin-top: 0.4rem;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* ── PODIUM SECTION ── */
        .podium-section {
            padding: 1rem 1.5rem 2.5rem;
            max-width: 900px;
            margin: 0 auto;
        }

        .podium-label {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.1rem;
            letter-spacing: 3px;
            opacity: 0.5;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .podium-row {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 12px;
        }

        /* Order: visual left=rank3, center=rank1, right=rank2 */
        .podium-card {
            flex: 1;
            max-width: 260px;
            border-radius: 16px;
            padding: 1.25rem 1rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease;
            cursor: default;
        }

        .podium-card:hover {
            transform: translateY(-6px);
        }

        /* rank 1 — tallest, center */
        .podium-card.rank-1 {
            order: 2;
            background: linear-gradient(145deg, #ffd700 0%, #f0a500 100%);
            color: #1a1400;
            padding-top: 1.8rem;
            padding-bottom: 1.8rem;
            box-shadow: 0 16px 48px rgba(255, 200, 0, 0.35);
        }

        /* rank 2 — right */
        .podium-card.rank-2 {
            order: 3;
            background: linear-gradient(145deg, #e8e8e8 0%, #b0b0b0 100%);
            color: #1a1a1a;
            box-shadow: 0 10px 32px rgba(0, 0, 0, 0.25);
        }

        /* rank 3 — left */
        .podium-card.rank-3 {
            order: 1;
            background: linear-gradient(145deg, #e8a96a 0%, #b5713a 100%);
            color: #1a0d00;
            box-shadow: 0 10px 32px rgba(0, 0, 0, 0.2);
        }

        .podium-rank-badge {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.8rem;
            line-height: 1;
            margin-bottom: 0.3rem;
            opacity: 0.2;
            position: absolute;
            top: 10px;
            right: 14px;
        }

        .podium-card img {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 0.75rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
        }

        .podium-crown {
            font-size: 1.6rem;
            margin-bottom: 0.3rem;
            display: block;
        }

        .podium-card h5 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.3rem;
            letter-spacing: 2px;
            margin: 0 0 0.25rem;
        }

        .podium-card .game-count {
            font-size: 0.78rem;
            font-weight: 600;
            opacity: 0.6;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .podium-base {
            margin-top: 0.75rem;
            height: 6px;
            border-radius: 4px;
            background: rgba(0, 0, 0, 0.15);
        }

        /* ── DIVIDER ── */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 14px;
            max-width: 960px;
            margin: 0 auto 2rem;
            padding: 0 1.5rem;
            opacity: 0.4;
        }

        .section-divider span {
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 3px;
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .section-divider::before,
        .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.4);
        }

        /* ── GENRE GRID ── */
        .genre-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem 4rem;
        }

        .genre-card {
            border-radius: 14px;
            overflow: hidden;
            position: relative;
            aspect-ratio: 4/3;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .genre-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
        }

        .genre-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .genre-card:hover img {
            transform: scale(1.08);
        }

        .genre-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10, 10, 40, 0.88) 0%, rgba(10, 10, 40, 0.15) 55%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1rem;
        }

        .genre-card-overlay h6 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.1rem;
            letter-spacing: 2px;
            margin: 0 0 3px;
            line-height: 1.1;
        }

        .genre-card-overlay small {
            font-size: 0.7rem;
            opacity: 0.6;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .genre-rank-tag {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 2px 8px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 600px) {
            .podium-row {
                gap: 8px;
            }

            .podium-card {
                padding: 1rem 0.6rem;
            }

            .podium-card img {
                width: 52px;
                height: 52px;
            }

            .genre-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                padding: 0 1rem 3rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <x-navbar />
    <!-- end Navbar -->

    <!-- Page Header -->
    <div class="page-header mt-4">
        <h1>Game Genres</h1>
        <p>Explore every category</p>
    </div>

    <!-- Podium Top 3 -->
    <div class="podium-section">
        <div class="podium-label">Top Genres</div>

        @if (count($genres) >= 3)
            <div class="podium-row">

                {{-- Rank 3 (kiri) --}}
                <div class="podium-card rank-3">
                    <span class="podium-rank-badge">#3</span>
                    @if ($genres[2]['image_background'])
                        <img src="{{ $genres[2]['image_background'] }}" alt="{{ $genres[2]['name'] }}">
                    @endif
                    <h5>{{ $genres[2]['name'] }}</h5>
                    <div class="game-count">{{ number_format($genres[2]['games_count']) }} games</div>
                    <div class="podium-base"></div>
                </div>

                {{-- Rank 1 (tengah) --}}
                <div class="podium-card rank-1">
                    <span class="podium-rank-badge">#1</span>
                    <span class="podium-crown">👑</span>
                    @if ($genres[0]['image_background'])
                        <img src="{{ $genres[0]['image_background'] }}" alt="{{ $genres[0]['name'] }}">
                    @endif
                    <h5>{{ $genres[0]['name'] }}</h5>
                    <div class="game-count">{{ number_format($genres[0]['games_count']) }} games</div>
                    <div class="podium-base"></div>
                </div>

                {{-- Rank 2 (kanan) --}}
                <div class="podium-card rank-2">
                    <span class="podium-rank-badge">#2</span>
                    @if ($genres[1]['image_background'])
                        <img src="{{ $genres[1]['image_background'] }}" alt="{{ $genres[1]['name'] }}">
                    @endif
                    <h5>{{ $genres[1]['name'] }}</h5>
                    <div class="game-count">{{ number_format($genres[1]['games_count']) }} games</div>
                    <div class="podium-base"></div>
                </div>

            </div>
        @endif
    </div>

    <!-- Divider -->
    <div class="section-divider">
        <span>All Genres</span>
    </div>

    <!-- Genre Grid (rank 4+) -->
    <div class="genre-grid">
        @foreach ($genres as $index => $genre)
            @if ($index >= 3)
                <div class="genre-card">
                    @if ($genre['image_background'])
                        <img src="{{ $genre['image_background'] }}" alt="{{ $genre['name'] }}" loading="lazy">
                    @else
                        <div style="width:100%;height:100%;background:#2a38b8;"></div>
                    @endif
                    <div class="genre-card-overlay">
                        <h6>{{ $genre['name'] }}</h6>
                        <small>{{ number_format($genre['games_count']) }} games</small>
                    </div>
                    <div class="genre-rank-tag">#{{ $index + 1 }}</div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
