<div class="mt-8">
    <div class="relative inline-block">
        <a href="{{route('games.show', $game['slug'])}}">
            <img src={{ $game['coverImageUrl']}} alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
            <!-- Rating -->
            @isset($game['rating'])
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right: -15px; bottom: -15px;">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{$game['rating']}}
                    </div>
                </div>
            @endisset
        </a>
    </div>
    <a href="{{route('games.show', $game['slug'])}}" class="block text-base font-bold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
    @isset($game['platforms'])
        <div class="text-gray-400 mt-1">
            {{$game['platforms']}}
        </div>
    @endisset
</div>