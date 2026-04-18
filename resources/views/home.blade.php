<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Games World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        #badan {
            background-color: #3747d1;
            color: white;
        }

        @media (min-width: 1200px) {
            .carousel-item img {
                height: 500px;
                object-fit: cover;
            }
        }

        @media (max-width: 768px) {
            .carousel-item img {
                height: 250px;
                object-fit: cover;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <x-navbar />
    <!-- end Navbar -->

    {{-- coursel (jumbotron) --}}
    <div id="carouselExampleDark" class="carousel carousel-light slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ $games[0]['background_image'] }}" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <h5>{{ $games[0]['name'] }}</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ $games[1]['background_image'] }}" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <h5>{{ $games[1]['name'] }}</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ $games[2]['background_image'] }}" class="d-block w-100" alt="...">
                <div class="carousel-caption  ">
                    <h5>{{ $games[2]['name'] }}</h5>
                    <p>ini bakal jadi store linknya</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- End coursel (jumbotron) --}}

    {{-- card game --}}
    <div class="p-3" id="badan">
        <h1> Games </h1>
        <div class="row">

            @foreach ($games as $game)
                @if ($loop->index == 12)
                    @break
                @endif
                <x-game-card :game="$game" />
            @endforeach
        </div>
    </div>
    {{-- end card game --}}


    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
