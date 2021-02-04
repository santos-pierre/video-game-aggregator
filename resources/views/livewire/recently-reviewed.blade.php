<div wire:init='loadRecentlyReviewedGames' class="mt-8 space-y-12 recently-reviewed-container">
    @forelse ($recentlyReviewed as $game)
        <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game">
            <div class="relative flex-none">
                <a href="{{route('games.show', $game['slug'])}}">
                    <img src={{ $game['coverImageUrl'] }} alt="game cover" class="w-24 transition duration-150 ease-in-out lg:w-48 hover:opacity-75">
                    <!-- Rating -->
                    @isset($game['rating'])
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right: -20px; bottom: -20px;">
                            <div id="{{$game['slug']}}" class="flex items-center justify-center h-full text-xs font-semibold">
                            </div>
                        </div>
                    @endisset
                </a>
            </div>
            <div class="ml-12">
                <a href="{{route('games.show', $game['slug'])}}" class="block mt-4 text-lg font-bold leading-tight hover:text-gray-400">{{$game['name']}}</a>
                @isset($game['platforms'])
                    <div class="mt-1 text-gray-400">
                        {{$game['platforms']}}
                    </div>
                @endisset
                @isset($game['summary'])
                    <p class="hidden mt-6 text-gray-400 lg:block">
                        {{$game['summary']}}
                    </p>
                @endisset
            </div>
        </div>
        @empty
        @foreach (range(1,3) as $game)
            <div class="flex px-6 py-6 bg-gray-800 rounded-lg shadow-md game animate-pulse">
                <div class="relative flex-none">
                    <div class="w-32 h-48 bg-gray-700 rounded lg:w-48 lg:h-56"></div>
                </div>
                <div class="ml-12">
                    <div class="block mt-4 text-lg leading-tight text-transparent bg-gray-700 rounded">My awesome title</div>
                    <div class="inline-block mt-1 text-transparent bg-gray-700 rounded">My platforms</div>
                    <div class="hidden mt-6 text-transparent bg-gray-700 rounded lg:block">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea pariatur omnis perspiciatis quam enim reiciendis doloremque! Adipisci consectetur dolorum sequi, asperiores tenetur optio mollitia illo!</div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
