<head>
    <link rel="stylesheet" href="{{ asset('gameCard.css') }}">
</head>

<div class="col-5 col-md-4 col-lg-2  m-3">
    <div class="card p-0 ">
        <div class="card-image">
            <img src="{{ $game['background_image'] ?? '' }}" class="card-img-top" alt="...">
        </div>
        <div class="card-content d-flex flex-column align-items-center">
            <p class="mt-2">{{ $game['genres'][0]['name'] ?? 'No Genres Available.' }}</p>

            <ul class="social-icons d-flex justify-content-center">
                <li style="--i:1">
                    @forelse ($game['stores'] ?? [] as $store)
                        <x-store-icon :store="$store" />
                    @empty
                        <span>No Yet Available.</span>
                    @endforelse
                </li>
            </ul>
        </div>
    </div>
    <h5 class="fs-5 mt-2 text-center">{{ $game['name'] ?? 'No Title' }}</h5>
</div>
