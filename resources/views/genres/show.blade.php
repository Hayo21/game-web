<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ucfirst(str_replace('-', ' ', $slug)) }} Games</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gameCard.css') }}">

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

        /* override gameCard.css body background biar nyambung */
        /* (kalau gameCard.css apply ke body, kita re-override di sini) */

        /* ── PAGE HEADER ── */
        .page-header {
            padding: 2.5rem 1.5rem 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header .breadcrumb-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            margin-bottom: 1rem;
            transition: color 0.2s;
        }

        .page-header .breadcrumb-back:hover {
            color: white;
        }

        .page-header h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2rem, 8vw, 4rem);
            letter-spacing: 4px;
            line-height: 1;
            margin: 0;
        }

        .page-header .subtitle {
            font-size: 0.82rem;
            opacity: 0.45;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 0.4rem;
            font-weight: 300;
        }

        /* ── DIVIDER ── */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 14px;
            max-width: 1200px;
            margin: 0 auto 2rem;
            padding: 0 1.5rem;
            opacity: 0.25;
        }

        .section-divider::before,
        .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: white;
        }

        /* ── GAMES GRID ── */
        .games-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem 5rem;
        }

        .games-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 0;
            justify-content: center;
        }

        /* override card max-width biar lebih fleksibel di grid */
        .games-grid .col-5 {
            display: flex;
            justify-content: center;
        }

        /* game title bawah card */
        .games-grid h5 {
            color: white !important;
        }

        /* empty state */
        .empty-state {
            text-align: center;
            padding: 5rem 1rem;
            opacity: 0.4;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .empty-state p {
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 300;
        }

        /* ── GAME COUNT BADGE ── */
        .game-count-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 999px;
            padding: 3px 12px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-left: 10px;
            vertical-align: middle;
            position: relative;
            top: -4px;
        }

        @media (max-width: 576px) {
            .page-header {
                padding: 2rem 1rem 1rem;
            }

            .games-section {
                padding: 0 0.5rem 4rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <x-navbar />

    <!-- Page Header -->
    <div class="page-header">
        <a href="{{ route('genres.index') }}" class="breadcrumb-back mt-5">
            <i class=   "fa-solid fa-arrow-left"></i> All Genres
        </a>
        <h1>
            {{ $genreName }}
            <span class="game-count-badge">{{ count($games) }} Games</span>
        </h1>
        <p class="subtitle">Browse games in this genre</p>
    </div>

    <!-- Divider -->
    <div class="section-divider"></div>

    <!-- Games Grid -->
    <div class="games-section">
        @if (count($games) > 0)
            <div class="games-grid row justify-content-center">
                @foreach ($games as $game)
                    <x-game-card :game="$game" />
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fa-solid fa-gamepad"></i>
                <p>No games found in this genre.</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
