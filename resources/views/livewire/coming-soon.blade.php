<div wire:init='loadComingSoonGames' class="coming-soon-container space-y-10 mt-8">
    @forelse ($comingSoon as $game)
        <div class="game flex">
            <a href="">
                <img src={{ Str::of($game['cover']['url'])->replace('thumb', 'cover_small')->__toString() }} alt="game cover"
                    class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="" class="block text-sm font-bold hover:text-gray-400"> {{$game['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">{{Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y')}}</div>
            </div>
        </div>
        @empty
        @foreach (range(1,4) as $game)
            <div class="game flex">
                <div>
                    <div class="w-16 h-24 bg-gray-800 rounded"></div>
                </div>
                <div class="ml-4">
                    <div class="block text-sm bg-gray-800 rounded text-transparent">My awesome title</div>
                    <div class="inline-block text-transparent text-sm mt-1 bg-gray-800 rounded">13, May 1996</div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>