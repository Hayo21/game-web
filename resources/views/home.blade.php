<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GameHub - Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap"
        rel="stylesheet">

    <style>
        /* ═══════════════════════════════════════════
           VARIABLES & RESET
        ═══════════════════════════════════════════ */
        :root {
            --bg: #0a0c10;
            --bg-card: #12151e;
            --bg-surface: #181c28;
            --accent: #e0354f;
            --accent-dim: rgba(224, 53, 79, 0.18);
            --gold: #f5c542;
            --text: #eceef4;
            --muted: #6b7491;
            --dim: #363c52;
            --border: rgba(255, 255, 255, 0.06);
            --radius: 14px;
            --sidebar-w: 240px;
            --header-h: 64px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* noise grain */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.025'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
        }

        /* ═══════════════════════════════════════════
           LAYOUT — PC sidebar + main
        ═══════════════════════════════════════════ */
        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        /* ── Sidebar (PC only) ── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--bg-card);
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-logo {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.25rem 0.5rem;
            margin-bottom: 2rem;
            text-decoration: none;
        }

        .sidebar-logo span {
            color: var(--accent);
        }

        .sidebar-section {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            padding: 0 0.5rem;
            margin-bottom: 0.5rem;
            margin-top: 1.25rem;
        }

        .sidebar-nav {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.75rem;
            border-radius: 10px;
            color: var(--muted);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 400;
            transition: all 0.2s;
        }

        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            background: var(--accent-dim);
            color: var(--text);
        }

        .sidebar-nav a.active {
            color: var(--accent);
            font-weight: 500;
        }

        .sidebar-nav .nav-icon {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 0.75rem 0.5rem;
            border-top: 1px solid var(--border);
            font-size: 0.75rem;
            color: var(--muted);
        }

        /* ── Main content ── */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-w);
            min-height: 100vh;
        }

        /* ── Top bar (PC) ── */
        .topbar {
            height: var(--header-h);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            background: rgba(10, 12, 16, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-search {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.45rem 1rem;
            width: 320px;
            transition: border-color 0.2s, width 0.3s;
        }

        .topbar-search:focus-within {
            border-color: rgba(224, 53, 79, 0.4);
            width: 380px;
        }

        .topbar-search input {
            background: none;
            border: none;
            outline: none;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            width: 100%;
        }

        .topbar-search input::placeholder {
            color: var(--muted);
        }

        .topbar-search .search-icon {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar-btn {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--muted);
            cursor: pointer;
            padding: 0.45rem 0.7rem;
            font-size: 0.9rem;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .topbar-btn:hover {
            color: var(--text);
            border-color: rgba(255, 255, 255, 0.15);
        }

        /* ── Page content padding ── */
        .page-inner {
            padding: 2rem 2.5rem 4rem;
        }

        /* ═══════════════════════════════════════════
           HERO SLIDER
        ═══════════════════════════════════════════ */
        .hero-slider {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            background: var(--bg-card);
            margin-bottom: 3rem;
            aspect-ratio: 16/7;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .hero-track {
            display: flex;
            height: 100%;
            transition: transform 0.6s cubic-bezier(0.77, 0, 0.18, 1);
            will-change: transform;
        }

        .hero-slide {
            flex: 0 0 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 8s linear;
        }

        .hero-slide.is-active img {
            transform: scale(1.06);
        }

        /* gradient overlays */
        .hero-slide::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to right,
                    rgba(10, 12, 16, 0.92) 0%,
                    rgba(10, 12, 16, 0.5) 45%,
                    rgba(10, 12, 16, 0.1) 100%);
            z-index: 1;
        }

        .hero-slide::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, var(--bg) 0%, transparent 100%);
            z-index: 1;
        }

        /* slide info */
        .hero-info {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 2.5rem 2.75rem;
            z-index: 2;
            max-width: 520px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: var(--accent);
            color: #fff;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 0.22rem 0.65rem;
            border-radius: 99px;
            margin-bottom: 0.75rem;
        }

        .hero-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 2.6rem;
            font-weight: 700;
            line-height: 1.05;
            color: #fff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
            margin-bottom: 0.5rem;
        }

        .hero-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 1.25rem;
        }

        .hero-rating {
            color: var(--gold);
            font-weight: 600;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent);
            color: #fff;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            padding: 0.65rem 1.5rem;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 20px rgba(224, 53, 79, 0.4);
        }

        .hero-btn:hover {
            background: #c72d45;
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(224, 53, 79, 0.5);
            color: #fff;
        }

        /* thumbnail strip */
        .hero-thumbs {
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            z-index: 3;
        }

        .hero-thumb {
            width: 72px;
            height: 48px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.25s, opacity 0.25s, transform 0.25s;
            opacity: 0.5;
        }

        .hero-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-thumb.active,
        .hero-thumb:hover {
            border-color: var(--accent);
            opacity: 1;
            transform: scale(1.06);
        }

        /* prev/next arrows */
        .hero-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 4;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.85rem;
            transition: background 0.2s, transform 0.2s;
        }

        .hero-arrow:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-50%) scale(1.1);
        }

        .hero-arrow.prev {
            left: 1rem;
        }

        .hero-arrow.next {
            right: 5.5rem;
        }

        /* progress bar */
        .hero-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 3;
        }

        .hero-progress-bar {
            height: 100%;
            background: var(--accent);
            width: 0%;
            transition: none;
        }

        .hero-progress-bar.animating {
            transition: width 4s linear;
        }

        /* ═══════════════════════════════════════════
           SECTION HEADERS
        ═══════════════════════════════════════════ */
        .sec-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .sec-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.2rem;
        }

        .sec-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text);
            line-height: 1;
        }

        .sec-link {
            font-size: 0.8rem;
            color: var(--muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .sec-link:hover {
            color: var(--accent);
        }

        /* ═══════════════════════════════════════════
           GAME CARDS GRID
        ═══════════════════════════════════════════ */
        .games-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .game-card {
            background: var(--bg-card);
            border-radius: var(--radius);
            overflow: hidden;
            position: relative;
            cursor: pointer;
            border: 1px solid var(--border);
            aspect-ratio: 2/3;
            transition: transform 0.3s cubic-bezier(.22, 1, .36, 1),
                box-shadow 0.3s cubic-bezier(.22, 1, .36, 1),
                border-color 0.3s;
        }

        .game-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            border-color: rgba(224, 53, 79, 0.4);
        }

        .game-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s cubic-bezier(.22, 1, .36, 1);
        }

        .game-card:hover img {
            transform: scale(1.08);
        }

        .game-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top,
                    rgba(0, 0, 0, 0.95) 0%,
                    rgba(0, 0, 0, 0.4) 40%,
                    transparent 75%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 0.9rem 0.75rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .game-card:hover .game-card-overlay {
            opacity: 1;
        }

        .game-card-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8);
        }

        .game-card-genre {
            font-size: 0.65rem;
            color: rgba(255, 255, 255, 0.55);
            margin-top: 0.2rem;
        }

        .game-card-rating {
            font-size: 0.68rem;
            font-weight: 600;
            color: var(--gold);
            margin-top: 0.3rem;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .game-card-no-img {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--bg-surface) 0%, #080a10 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--dim);
        }

        /* skeleton */
        .game-skeleton {
            background: linear-gradient(90deg,
                    var(--bg-card) 25%,
                    var(--bg-surface) 50%,
                    var(--bg-card) 75%);
            background-size: 800px 100%;
            animation: shimmer 1.6s infinite linear;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            aspect-ratio: 2/3;
        }

        @keyframes shimmer {
            0% {
                background-position: -800px 0;
            }

            100% {
                background-position: 800px 0;
            }
        }

        /* ═══════════════════════════════════════════
           SCROLL-IN
        ═══════════════════════════════════════════ */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @for ($i = 1; $i <= 12; $i++)
            .d-{{ $i }} {
                transition-delay: {{ $i * 0.04 }}s;
            }
        @endfor

        /* ═══════════════════════════════════════════
           ERROR BANNER
        ═══════════════════════════════════════════ */
        .api-error {
            background: rgba(220, 38, 38, 0.1);
            border: 1px solid rgba(220, 38, 38, 0.2);
            border-radius: 10px;
            color: #fca5a5;
            font-size: 0.83rem;
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
        }

        /* ═══════════════════════════════════════════
           MOBILE NAV (bottom bar)
        ═══════════════════════════════════════════ */
        .mobile-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(18, 21, 30, 0.95);
            backdrop-filter: blur(16px);
            border-top: 1px solid var(--border);
            padding: 0.6rem 0 calc(0.6rem + env(safe-area-inset-bottom));
            z-index: 200;
        }

        .mobile-nav-inner {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .mobile-nav-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            color: var(--muted);
            text-decoration: none;
            font-size: 0.6rem;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            transition: color 0.2s;
            padding: 0.25rem 1rem;
        }

        .mobile-nav-btn.active,
        .mobile-nav-btn:hover {
            color: var(--accent);
        }

        .mobile-nav-btn .mn-icon {
            font-size: 1.25rem;
        }

        /* ═══════════════════════════════════════════
           RESPONSIVE BREAKPOINTS
        ═══════════════════════════════════════════ */
        @media (max-width: 1400px) {
            .games-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        @media (max-width: 1100px) {
            .games-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .hero-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 900px) {
            :root {
                --sidebar-w: 0px;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                padding: 0 1.25rem;
            }

            .topbar-search {
                width: 220px;
            }

            .topbar-search:focus-within {
                width: 260px;
            }

            .page-inner {
                padding: 1.25rem 1.25rem 6rem;
            }

            .games-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 0.75rem;
            }

            .mobile-nav {
                display: block;
            }

            .hero-slider {
                aspect-ratio: 16/9;
                border-radius: 14px;
            }

            .hero-title {
                font-size: 1.6rem;
            }

            .hero-info {
                padding: 1.5rem;
            }

            .hero-thumbs {
                display: none;
            }

            .hero-arrow.next {
                right: 1rem;
            }
        }

        @media (max-width: 600px) {
            .games-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 0.6rem;
            }

            .topbar-search {
                width: 160px;
            }

            .topbar-search:focus-within {
                width: 190px;
            }

            .hero-slider {
                aspect-ratio: 4/3;
            }

            .hero-title {
                font-size: 1.3rem;
            }

            .hero-meta {
                gap: 0.6rem;
                font-size: 0.72rem;
            }

            .hero-btn {
                font-size: 0.8rem;
                padding: 0.5rem 1rem;
            }
        }

        @media (max-width: 400px) {
            .games-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-inner {
                padding: 1rem 0.9rem 6rem;
            }
        }
    </style>
</head>

<body>
    <div class="app-layout">

        {{-- ══════════════════════════════════════
         SIDEBAR (PC)
    ══════════════════════════════════════ --}}
        <aside class="sidebar">
            <a href="/" class="sidebar-logo">
                🎮 Game<span>Hub</span>
            </a>

            <div class="sidebar-section">Menu</div>
            <ul class="sidebar-nav">
                <li><a href="/" class="active"><span class="nav-icon">🏠</span> Home</a></li>
                <li><a href="#"><span class="nav-icon">🔥</span> Hot Games</a></li>
                <li><a href="#new-games"><span class="nav-icon">✨</span> New Releases</a></li>
                <li><a href="#popular-games"><span class="nav-icon">⭐</span> Popular</a></li>
            </ul>

            <div class="sidebar-section">Genre</div>
            <ul class="sidebar-nav">
                <li><a href="#"><span class="nav-icon">⚔️</span> Action</a></li>
                <li><a href="#"><span class="nav-icon">🧩</span> RPG</a></li>
                <li><a href="#"><span class="nav-icon">🏎️</span> Racing</a></li>
                <li><a href="#"><span class="nav-icon">🔫</span> Shooter</a></li>
                <li><a href="#"><span class="nav-icon">🧠</span> Strategy</a></li>
            </ul>

            <div class="sidebar-footer">
                GameHub &copy; {{ date('Y') }} &mdash; Powered by RAWG
            </div>
        </aside>

        {{-- ══════════════════════════════════════
         MAIN CONTENT
    ══════════════════════════════════════ --}}
        <main class="main-content">

            {{-- Top bar --}}
            <header class="topbar">
                <div class="topbar-search">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="searchInput" placeholder="Search games..." autocomplete="off">
                </div>
                <div class="topbar-actions">
                    <a href="#" class="topbar-btn" title="Notifications">🔔</a>
                    <a href="#" class="topbar-btn" title="Profile">👤</a>
                </div>
            </header>

            <div class="page-inner">

                {{-- Error state --}}
                @if ($hotGames->isEmpty() && $popularGames->isEmpty() && $newGames->isEmpty())
                    <div class="api-error">
                        ⚠️ Gagal memuat data game. Pastikan <code>API_RAWG</code> sudah di-set di <code>.env</code> dan
                        jalankan <code>php artisan config:clear</code>.
                    </div>
                @endif

                {{-- ══════════════════════════════
                 HERO SLIDER
            ══════════════════════════════ --}}
                @if ($hotGames->isNotEmpty())
                    <div class="hero-slider fade-up" id="heroSlider">
                        <div class="hero-track" id="heroTrack">
                            @foreach ($hotGames as $i => $game)
                                <div class="hero-slide {{ $i === 0 ? 'is-active' : '' }}">
                                    @if ($game['background_image'])
                                        <img src="{{ $game['background_image'] }}" alt="{{ e($game['name']) }}"
                                            loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
                                    @else
                                        <div
                                            style="width:100%;height:100%;background:var(--bg-surface);display:flex;align-items:center;justify-content:center;font-size:4rem;">
                                            🎮</div>
                                    @endif
                                    <div class="hero-info">
                                        <div class="hero-badge">🔥 Hot Right Now</div>
                                        <h1 class="hero-title">{{ $game['name'] }}</h1>
                                        <div class="hero-meta">
                                            @if ($game['rating'] > 0)
                                                <span class="hero-rating">★
                                                    {{ number_format($game['rating'], 1) }}</span>
                                            @endif
                                            @if ($game['genres'])
                                                <span>{{ $game['genres'] }}</span>
                                            @endif
                                        </div>
                                        <a href="https://rawg.io/games/{{ $game['id'] }}" target="_blank"
                                            rel="noopener" class="hero-btn">
                                            ▶ View Game
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Thumbnail strip --}}
                        <div class="hero-thumbs">
                            @foreach ($hotGames as $i => $game)
                                <div class="hero-thumb {{ $i === 0 ? 'active' : '' }}"
                                    data-index="{{ $i }}">
                                    @if ($game['background_image'])
                                        <img src="{{ $game['background_image'] }}" alt="{{ e($game['name']) }}"
                                            loading="lazy">
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        {{-- Arrows --}}
                        <button class="hero-arrow prev" id="heroPrev" aria-label="Previous">‹</button>
                        <button class="hero-arrow next" id="heroNext" aria-label="Next">›</button>

                        {{-- Progress bar --}}
                        <div class="hero-progress">
                            <div class="hero-progress-bar" id="heroProgressBar"></div>
                        </div>
                    </div>
                @endif

                {{-- ══════════════════════════════
                 NEW RELEASES
            ══════════════════════════════ --}}
                <div id="new-games">
                    <div class="sec-header fade-up">
                        <div>
                            <div class="sec-label">Just Dropped</div>
                            <div class="sec-title">New Releases</div>
                        </div>
                        <a href="#" class="sec-link">See all →</a>
                    </div>

                    <div class="games-grid" id="newGrid">
                        @if ($newGames->isEmpty())
                            @for ($i = 0; $i < 6; $i++)
                                <div class="game-skeleton"></div>
                            @endfor
                        @else
                            @foreach ($newGames as $idx => $game)
                                <div class="game-card fade-up d-{{ ($idx % 12) + 1 }}">
                                    @if ($game['background_image'])
                                        <img src="{{ $game['background_image'] }}" alt="{{ e($game['name']) }}"
                                            loading="lazy">
                                    @else
                                        <div class="game-card-no-img">🎮</div>
                                    @endif
                                    <div class="game-card-overlay">
                                        <div class="game-card-name">{{ $game['name'] }}</div>
                                        @if ($game['genres'])
                                            <div class="game-card-genre">{{ $game['genres'] }}</div>
                                        @endif
                                        @if ($game['rating'] > 0)
                                            <div class="game-card-rating">★ {{ number_format($game['rating'], 1) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                {{-- ══════════════════════════════
                 POPULAR GAMES
            ══════════════════════════════ --}}
                <div id="popular-games">
                    <div class="sec-header fade-up">
                        <div>
                            <div class="sec-label">Discover</div>
                            <div class="sec-title">Popular Games</div>
                        </div>
                        <a href="#" class="sec-link">See all →</a>
                    </div>

                    <div class="games-grid" id="gameGrid">
                        @if ($popularGames->isEmpty())
                            @for ($i = 0; $i < 12; $i++)
                                <div class="game-skeleton"></div>
                            @endfor
                        @else
                            @foreach ($popularGames as $idx => $game)
                                <div class="game-card fade-up d-{{ ($idx % 12) + 1 }}">
                                    @if ($game['background_image'])
                                        <img src="{{ $game['background_image'] }}" alt="{{ e($game['name']) }}"
                                            loading="lazy">
                                    @else
                                        <div class="game-card-no-img">🎮</div>
                                    @endif
                                    <div class="game-card-overlay">
                                        <div class="game-card-name">{{ $game['name'] }}</div>
                                        @if ($game['genres'])
                                            <div class="game-card-genre">{{ $game['genres'] }}</div>
                                        @endif
                                        @if ($game['rating'] > 0)
                                            <div class="game-card-rating">★ {{ number_format($game['rating'], 1) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>{{-- /page-inner --}}
        </main>
    </div>

    {{-- Mobile bottom nav --}}
    <nav class="mobile-nav">
        <div class="mobile-nav-inner">
            <a href="/" class="mobile-nav-btn active"><span class="mn-icon">🏠</span>Home</a>
            <a href="#new-games" class="mobile-nav-btn"><span class="mn-icon">✨</span>New</a>
            <a href="#popular-games" class="mobile-nav-btn"><span class="mn-icon">⭐</span>Popular</a>
            <a href="#" class="mobile-nav-btn"><span class="mn-icon">👤</span>Profile</a>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script>
        (() => {
            'use strict';

            /* ── Scroll-in observer ─────────────────── */
            const io = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                        io.unobserve(e.target);
                    }
                });
            }, {
                threshold: 0.06
            });
            document.querySelectorAll('.fade-up').forEach(el => io.observe(el));

            /* ── Hero Slider ────────────────────────── */
            const track = document.getElementById('heroTrack');
            const slides = track ? track.querySelectorAll('.hero-slide') : [];
            const thumbs = document.querySelectorAll('.hero-thumb');
            const prevBtn = document.getElementById('heroPrev');
            const nextBtn = document.getElementById('heroNext');
            const progBar = document.getElementById('heroProgressBar');
            const INTERVAL = 4000;
            let current = 0;
            let timer = null;

            function goTo(idx) {
                if (!track || slides.length === 0) return;
                slides[current].classList.remove('is-active');
                if (thumbs[current]) thumbs[current].classList.remove('active');
                current = (idx + slides.length) % slides.length;
                slides[current].classList.add('is-active');
                if (thumbs[current]) thumbs[current].classList.add('active');
                track.style.transform = `translateX(-${current * 100}%)`;
                resetProgress();
            }

            function resetProgress() {
                if (!progBar) return;
                progBar.classList.remove('animating');
                progBar.style.width = '0%';
                // force reflow
                void progBar.offsetWidth;
                progBar.classList.add('animating');
                progBar.style.width = '100%';
            }

            function startAuto() {
                stopAuto();
                timer = setInterval(() => goTo(current + 1), INTERVAL);
            }

            function stopAuto() {
                clearInterval(timer);
            }

            if (track && slides.length > 1) {
                if (prevBtn) prevBtn.addEventListener('click', () => {
                    goTo(current - 1);
                    startAuto();
                });
                if (nextBtn) nextBtn.addEventListener('click', () => {
                    goTo(current + 1);
                    startAuto();
                });
                thumbs.forEach(th => th.addEventListener('click', () => {
                    goTo(+th.dataset.index);
                    startAuto();
                }));

                // pause on hover
                document.getElementById('heroSlider')?.addEventListener('mouseenter', stopAuto);
                document.getElementById('heroSlider')?.addEventListener('mouseleave', startAuto);

                // touch swipe
                let touchX = 0;
                track.addEventListener('touchstart', e => {
                    touchX = e.touches[0].clientX;
                }, {
                    passive: true
                });
                track.addEventListener('touchend', e => {
                    const dx = e.changedTouches[0].clientX - touchX;
                    if (Math.abs(dx) > 40) {
                        goTo(current + (dx < 0 ? 1 : -1));
                        startAuto();
                    }
                }, {
                    passive: true
                });

                goTo(0);
                startAuto();
            }

            /* ── Search filter ──────────────────────── */
            const searchInput = document.getElementById('searchInput');
            const allCards = document.querySelectorAll('.game-card');
            if (searchInput) {
                searchInput.addEventListener('input', () => {
                    const q = searchInput.value.trim().toLowerCase();
                    allCards.forEach(card => {
                        const name = card.querySelector('.game-card-name')?.textContent.toLowerCase() ??
                            '';
                        card.style.display = (!q || name.includes(q)) ? '' : 'none';
                    });
                });
            }

            /* ── Native lazy-load fallback ──────────── */
            if (!('loading' in HTMLImageElement.prototype)) {
                const imgs = document.querySelectorAll('img[loading="lazy"]');
                const li = new IntersectionObserver(entries => {
                    entries.forEach(e => {
                        if (e.isIntersecting) {
                            e.target.src = e.target.src;
                            li.unobserve(e.target);
                        }
                    });
                });
                imgs.forEach(img => li.observe(img));
            }

            /* ── Mobile nav active state ────────────── */
            const mobileLinks = document.querySelectorAll('.mobile-nav-btn');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileLinks.forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                });
            });
        })();
    </script>
</body>

</html>
