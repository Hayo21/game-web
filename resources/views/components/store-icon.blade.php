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

         @case('nintendo')
             <span class="small bg-danger text-white px-2 py-1 rounded-pill">
                 Nintendo
             </span>
         @break

         @case('epic-games')
             <span class="badge bg-dark">Epic Games</span>
         @break

         @default
             <span>{{ $store['store']['name'] }}</span>
     @endswitch
