<div wire:init='loadRecentlyReviewedGames' class="recently-reviewed-container space-y-12 mt-8">
    @forelse ($recentlyReviewed as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="{{route('games.show', $game['slug'])}}">
                    <img src={{ $game['coverImageUrl'] }} alt="game cover" class="lg:w-48 w-24 hover:opacity-75 transition ease-in-out duration-150">
                    <!-- Rating -->
                    @isset($game['rating'])
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right: -20px; bottom: -20px;">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{$game['rating']}}
                            </div>
                        </div>
                    @endisset
                </a>
            </div>
            <div class="ml-12">
                <a href="{{route('games.show', $game['slug'])}}" class="block text-lg font-bold leading-tight hover:text-gray-400 mt-4">{{$game['name']}}</a>
                @isset($game['platforms'])
                    <div class="text-gray-400 mt-1">
                        {{$game['platforms']}}
                    </div>
                @endisset
                @isset($game['summary'])
                    <p class="mt-6 text-gray-400 lg:block hidden">
                        {{$game['summary']}}
                    </p>
                @endisset
            </div>
        </div>
        @empty
        @foreach (range(1,3) as $game)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <div class="lg:w-48 w-32 lg:h-56 h-48 bg-gray-700 rounded"></div>
                </div>
                <div class="ml-12">
                    <div class="block text-lg text-transparent leading-tight bg-gray-700 mt-4 rounded">My awesome title</div>
                    <div class="inline-block bg-gray-700 text-transparent mt-1 rounded">My platforms</div>
                    <div class="mt-6 bg-gray-700 text-transparent lg:block hidden rounded">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea pariatur omnis perspiciatis quam enim reiciendis doloremque! Adipisci consectetur dolorum sequi, asperiores tenetur optio mollitia illo!</div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
