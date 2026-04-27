@switch($store['store']['slug'])
    @case('steam')
        <span style="color:rgb(33, 33, 159)" class="fab fa-steam"></span>
    @break

    @case('playstation-store')
        <span style="color:#003087" class="fab fa-playstation"></span>
    @break

    @case('apple-appstore')
        <span style="color:black" class="fab fa-app-store-ios"></span>
    @break

    @case('google-play')
        <span style="color:#10a1cd" class="fab fa-google-play"></span>
    @break

    @case('xbox-store')
        <span style="color:#107c10" class="fab fa-xbox"></span>
    @break

    @case('xbox360')
        <span style="color:#107c10" class="fab fa-xbox">360</span>
    @break

    @case('nintendo')
        <span class="small bg-danger text-white px-2 py-1 rounded-pill"
            style="font-weight: bold; font-size: 0.70rem;">NINTENDO</span>
    @break

    @case('epic-games')
        <span class="badge bg-dark" style="font-size:0.70rem">Epic</span>
    @break

    @case('gog')
        <span class="badge " style="font-size:0.70rem; background-color: #b315e3; color: white;">GOG</span>
    @break

    @default
        <span style="font-size:0.6rem;opacity:0.7">{{ $store['store']['name'] }}</span>
@endswitch
