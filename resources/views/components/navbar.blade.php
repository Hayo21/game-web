<style>
    .navbar-glass {
        background: rgba(255, 255, 255, 0.45);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 50px;
        padding: 0.35rem 1rem;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.10);
        transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    .navbar-glass:hover {
        background: rgba(255, 255, 255, 0.55);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    }

    .navbar-glass .navbar-brand {
        font-weight: 700;
        font-size: 1.1rem;
        color: #1a1a2e;
        letter-spacing: 0.5px;
    }

    .navbar-glass .nav-link {
        color: #2d2d3f;
        font-weight: 500;
        font-size: 0.9rem;
        padding: 0.4rem 0.85rem;
        border-radius: 20px;
        transition: background 0.25s ease, color 0.25s ease;
    }

    .navbar-glass .nav-link:hover,
    .navbar-glass .nav-link.active {
        background: rgba(0, 0, 0, 0.08);
        color: #1a1a2e;
    }

    .navbar-glass .navbar-toggler {
        border: none;
        padding: 0.25rem 0.5rem;
        font-size: 1rem;
    }

    .navbar-glass .navbar-toggler:focus {
        box-shadow: none;
    }

    .navbar-glass .navbar-toggler-icon {
        width: 1.2em;
        height: 1.2em;
    }

    .navbar-glass .btn-search {
        background: rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.15);
        color: #1a1a2e;
        border-radius: 20px;
        padding: 0.3rem 0.75rem;
        font-size: 0.85rem;
        transition: background 0.25s ease;
        white-space: nowrap;
    }

    .navbar-glass .btn-search:hover {
        background: rgba(0, 0, 0, 0.12);
        color: #1a1a2e;
    }

    .navbar-glass .form-control {
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(0, 0, 0, 0.12);
        color: #333;
        border-radius: 20px;
        font-size: 0.85rem;
        padding: 0.3rem 0.85rem;
        /* di mobile lebih kecil biar muat */
        min-width: 0;
        width: 100%;
    }

    .navbar-glass .form-control::placeholder {
        color: rgba(0, 0, 0, 0.4);
    }

    .navbar-glass .form-control:focus {
        background: rgba(255, 255, 255, 0.65);
        border-color: rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.05);
        color: #333;
    }

    /* search form selalu inline */
    .navbar-search-form {
        display: flex;
        gap: 6px;
        align-items: center;
        flex: 1;
        max-width: 260px;
        min-width: 0;
    }

    /* di desktop collapse inline, no extra bg */
    @media (min-width: 992px) {
        .navbar-glass .navbar-collapse {
            background: transparent;
            backdrop-filter: none;
            margin-top: 0;
            padding: 0;
            border-radius: 0;
        }

        .navbar-search-form {
            max-width: 220px;
        }
    }

    .navbar-wrapper {
        padding: 1rem 2rem 0;
    }

    @media (max-width: 991.98px) {
        .navbar-wrapper {
            padding: 0.75rem 0.75rem 0;
        }

        .navbar-glass {
            border-radius: 24px;
            padding: 0.35rem 0.85rem;
        }

        .navbar-glass .nav-link {
            padding: 0.5rem 0.85rem;
        }
    }
</style>

<div class="navbar-wrapper fixed-top d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-glass w-100">
        <div class="container-fluid p-0 gap-2">

            {{-- Brand --}}
            <a class="navbar-brand flex-shrink-0" href="#">Games</a>

            {{-- Search: selalu tampil, sejajar brand dan toggler --}}
            <form class="navbar-search-form" role="search">
                <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-search flex-shrink-0" type="submit">🔍</button>
            </form>

            {{-- Toggler di paling kanan saat mobile --}}
            <button class="navbar-toggler flex-shrink-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Nav links: collapse di mobile, inline di desktop --}}
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-0 gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('genres.index') ? 'active' : '' }}"
                            href="{{ route('genres.index') }}">Genres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">About</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</div>