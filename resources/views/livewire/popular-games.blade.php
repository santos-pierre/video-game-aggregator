<div wire:init='loadPopularGames' class="popular-game text-sm grid lg:grid-cols-6 md:grid-cols-4 grid-cols-2 gap-12 border-b border-gray-800 pb-16">
    @forelse ($popularGames as $game)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="{{route('games.show', $game['slug'])}}">
                    <img src={{ Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() }} alt="game cover"
                        class="hover:opacity-75 transition ease-in-out duration-150">
                    <!-- Rating -->
                    @isset($game['rating'])
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                            style="right: -15px; bottom: -15px;">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{round($game['rating']).'%'}}
                            </div>
                        </div>
                    @endisset
                </a>
            </div>
            <a href="{{route('games.show', $game['slug'])}}" class="block text-base font-bold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
            @isset($game['platforms'])
                <div class="text-gray-400 mt-1">
                    @foreach ($game['platforms'] as $platform)
                        @isset($platform["abbreviation"])
                            {{$platform["abbreviation"].','}}
                        @endisset
                    @endforeach
                </div>
            @endisset
        </div>
        @empty
        @foreach (range(1,12) as $game)
            <div class="game mt-8">
                <div class="inline-block relative">
                    <div class="h-64 w-44 bg-gray-800 rounded"></div>
                </div>
                <div class="block text-lg bg-gray-800 text-transparent leading-tight mt-4 rounded">My amazing title</div>
                <div class="inline-block bg-gray-800 text-transparent rounded mt-1">my platforms</div>
            </div>
        @endforeach
    @endforelse
</div>