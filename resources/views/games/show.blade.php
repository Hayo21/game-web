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
    <link rel="stylesheet" href="{{ asset('gameShow.css') }}">
</head>

<body>

    <!-- Navbar -->
    <x-navbar />

    <!-- Hero Image -->
    @if (!empty($game['background_image']))
        <div class="game-hero">
            <img src="{{ $game['background_image'] }}" alt="{{ $game['name'] }} ">
            <div class="game-hero-overlay "></div>
            <div class="game-hero-title">
                <h1>{{ $game['name'] }}</h1>
            </div>
        </div>
    @else
        <div class="hero-placeholder">
            <i class="fa-solid fa-gamepad"></i>
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

        <!-- Trailer / Videos -->
        @if (!empty($movies['results']) && count($movies['results']) > 0)
            <div class="info-block">
                <div class="info-block-label">Trailer</div>

                @foreach ($movies['results'] as $index => $movie)
                    @php
                        $videoUrl = $movie['data']['max'] ?? ($movie['data']['480'] ?? null);
                        $thumb = $movie['preview'] ?? ($game['background_image'] ?? '');
                    @endphp

                    @if ($videoUrl)
                        <div style="{{ $index > 0 ? 'margin-top:12px;' : '' }}">
                            {{-- Thumbnail view --}}
                            <div class="trailer-wrap" id="thumb-{{ $index }}"
                                onclick="playTrailer({{ $index }}, '{{ $videoUrl }}')">
                                <img src="{{ $thumb }}" alt="{{ $movie['name'] }}" class="trailer-thumb">
                                <div class="trailer-play-btn">
                                    <span><i class="fa-solid fa-play"></i></span>
                                </div>
                                <div class="trailer-title-tag">{{ $movie['name'] }}</div>
                            </div>

                            {{-- Video player (hidden until clicked) --}}
                            <div class="trailer-video" id="video-{{ $index }}">
                                <video controls>
                                    <source src="{{ $videoUrl }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="soft-divider"></div>
        @endif

        <!-- Screenshots -->
        @if (!empty($screenshots['results']) && count($screenshots['results']) > 0)
            <div class="info-block">
                <div class="info-block-label">Screenshots</div>
                <div class="screenshots-grid" id="screenshotsGrid">
                    @foreach ($screenshots['results'] as $i => $shot)
                        <div class="screenshot-item" onclick="openLightbox({{ $i }})">
                            <img src="{{ $shot['image'] }}" alt="Screenshot {{ $i + 1 }}" loading="lazy">
                            <div class="screenshot-zoom-icon">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
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

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox" onclick="closeLightboxOnBg(event)">
        <div class="lightbox-inner">
            <button class="lightbox-close" onclick="closeLightbox()">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <button class="lightbox-nav prev" onclick="prevShot()">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <img src="" id="lightboxImg" alt="Screenshot">
            <button class="lightbox-nav next" onclick="nextShot()">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <script>
        // ── TRAILER ──
        function playTrailer(index, videoUrl) {
            const thumb = document.getElementById('thumb-' + index);
            const videoWrap = document.getElementById('video-' + index);
            const video = videoWrap.querySelector('video');

            thumb.style.display = 'none';
            videoWrap.style.display = 'block';
            video.play();
        }

        // ── LIGHTBOX ──
        const screenshots = @json(collect($screenshots['results'] ?? [])->pluck('image')->values());
        let currentShot = 0;

        function openLightbox(index) {
            currentShot = index;
            document.getElementById('lightboxImg').src = screenshots[index];
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }

        function closeLightboxOnBg(e) {
            if (e.target === document.getElementById('lightbox')) closeLightbox();
        }

        function prevShot() {
            currentShot = (currentShot - 1 + screenshots.length) % screenshots.length;
            document.getElementById('lightboxImg').src = screenshots[currentShot];
        }

        function nextShot() {
            currentShot = (currentShot + 1) % screenshots.length;
            document.getElementById('lightboxImg').src = screenshots[currentShot];
        }

        // keyboard navigation
        document.addEventListener('keydown', (e) => {
            const lb = document.getElementById('lightbox');
            if (!lb.classList.contains('active')) return;
            if (e.key === 'ArrowLeft') prevShot();
            if (e.key === 'ArrowRight') nextShot();
            if (e.key === 'Escape') closeLightbox();
        });
    </script>
</body>

</html>
