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
                        @switch($store['store']['slug'])
                            @case('steam')
                                <span style="color:rgb(33, 33, 159)" class="fab fa-steam"></span>
                            @break

                            @case('playstation-store')
                                <span style="color:black" class="fab fa-playstation"></span>
                            @break

                            @case('xbox-store')
                                <span style="color:green" class="fab fa-x-box"></span>
                            @break

                            @default
                                <span>{{ $store['store']['name'] }}</span>
                        @endswitch
                        @empty
                            <span>No Stores Available.</span>
                        @endforelse
                    </li>
                </ul>
            </div>
        </div>
        <h5 class="fs-5 mt-2 text-center">{{ $game['name'] ?? 'No Title' }}</h5>
    </div>
