<head>
    <link rel="stylesheet" href="{{ asset('gameCard.css') }}">
</head>



<div class="col-12 col-md-6 col-lg-4 ">
    <div class="card p-0 ">
        <div class="card-image">
            <img src="{{ $game['background_image'] ?? '' }}" class="card-img-top" alt="...">
        </div>
        <div class="card-content d-flex flex-column align-items-center">
            <h4 class="pt-2">{{ $game['name'] ?? 'No Title' }}</h4>
            <h5>{{ $game['description'] ?? 'No description available.' }}</h5>

            <ul class="social-icons d-flex justify-content-center">
                <li style="--i:1">
                    <a href="#">
                        <span class="fab fa-facebook"></span>
                    </a>
                </li>
                <li style="--i:2">
                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>
                </li>
                <li style="--i:3">
                    <a href="#">
                        <span class="fab fa-instagram"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
