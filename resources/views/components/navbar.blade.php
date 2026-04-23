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
        padding: 0.3rem 1rem;
        font-size: 0.85rem;
        transition: background 0.25s ease;
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

    /* Responsive wrapper margins */
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

        .navbar-glass .navbar-collapse {
            padding: 0.5rem 0;
        }

        .navbar-glass .nav-link {
            padding: 0.5rem 0.85rem;
        }
    }
</style>

<div class="navbar-wrapper fixed-top d-flex justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-glass">
        <div class="container-fluid p-0 ">
            <a class="navbar-brand" href="#">Games</a>

            <form class="d-flex gap-2 me-3" role="search">
                <input class="form-control" type="search" placeholder="Search games..." aria-label="Search">
                <button class="btn btn-search " type="submit">🔍</button>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class=" navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item ">
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
