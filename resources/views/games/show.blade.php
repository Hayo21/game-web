<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $game['name'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #3747d1;
            color: white;
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
        }

        /* ── HERO ── */
        .game-hero {
            position: relative;
            width: 100%;
            max-height: 480px;
            overflow: hidden;
        }

        .game-hero img {
            width: 100%;
            height: 100%;
            max-height: 480px;
            object-fit: cover;
            object-position: center top;
            display: block;
            filter: brightness(0.6);
        }

        .game-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, #3747d1 0%, rgba(55, 71, 209, 0.3) 50%, transparent 100%);
        }

        .game-hero-title {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            right: 1.5rem;
        }

        .game-hero-title h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2rem, 7vw, 3.8rem);
            letter-spacing: 3px;
            line-height: 1;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
        }

        /* ── CONTENT ── */
        .game-content {
            max-width: 820px;
            margin: 0 auto;
            padding: 2rem 1.25rem 5rem;
        }

        /* back button */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.55);
            text-decoration: none;
            margin-bottom: 2rem;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: white;
        }

        /* section block */
        .info-block {
            margin-bottom: 2rem;
        }

        .info-block-label {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 0.78rem;
            letter-spacing: 3px;
            opacity: 0.45;
            text-transform: uppercase;
            margin-bottom: 0.6rem;
        }

        /* description */
        .description-text {
            font-size: 0.95rem;
            line-height: 1.8;
            font-weight: 300;
            opacity: 0.85;
        }

        /* genre pills */
        .genre-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .genre-pill {
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            transition: background 0.2s;
        }

        .genre-pill:hover {
            background: rgba(255, 255, 255, 0.22);
        }

        /* store cards */
        .store-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .store-card {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: white;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
        }

        .store-card:hover {
            background: rgba(255, 255, 255, 0.18);
            color: white;
            transform: translateY(-2px);
        }

        .store-card i {
            opacity: 0.6;
            font-size: 0.8rem;
        }

        /* divider */
        .soft-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin-bottom: 2rem;
        }

        /* no image placeholder */
        .hero-placeholder {
            height: 220px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.01));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.3;
            font-size: 3rem;
        }

        @media (max-width: 576px) {
            .game-hero {
                max-height: 300px;
            }

            .game-hero img {
                max-height: 300px;
            }

            .game-content {
                padding: 1.5rem 1rem 4rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <x-navbar />
    <!-- end Navbar -->

    <!-- Hero Image -->
    @if (!empty($game['background_image']))
        <div class="game-hero">
            <img src="{{ $game['background_image'] }}" alt="{{ $game['name'] }}">
            <div class="game-hero-overlay"></div>
            <div class="game-hero-title">
                <h1>{{ $game['name'] }}</h1>
            </div>
        </div>
    @else
        <div class="hero-placeholder">
            <i class="fa-solid fa-gamepad"></i>
        </div>
        <div class="game-content">
            <h1 style="font-family:'Bebas Neue',sans-serif;font-size:2.5rem;letter-spacing:3px;margin-bottom:1.5rem;">
                {{ $game['name'] }}
            </h1>
        </div>
    @endif

    <!-- Content -->
    <div class="game-content">

        <!-- Back -->
        <a href="{{ url()->previous() }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>

        <!-- Description -->
        @if (!empty($game['description_raw']))
            <div class="info-block">
                <div class="info-block-label">Description</div>
                <p class="description-text">{{ $game['description_raw'] }}</p>
            </div>
            <div class="soft-divider"></div>
        @endif

        <!-- Genres -->
        <div class="info-block">
            <div class="info-block-label">Genres</div>
            <div class="genre-pills">
                @forelse ($game['genres'] ?? [] as $genre)
                    <span class="genre-pill">{{ $genre['name'] }}</span>
                @empty
                    <span style="opacity:0.4;font-size:0.9rem;">No genres available.</span>
                @endforelse
            </div>
        </div>

        <div class="soft-divider"></div>

        <!-- Stores -->
        <div class="info-block">
            <div class="info-block-label">Available On</div>
            <div class="store-list">
                @forelse ($game['stores'] ?? [] as $store)
                    <span class="store-card">
                        <i class="fa-solid fa-store"></i>
                        {{ $store['store']['name'] }}
                    </span>
                @empty
                    <span style="opacity:0.4;font-size:0.9rem;">No stores available.</span>
                @endforelse
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
