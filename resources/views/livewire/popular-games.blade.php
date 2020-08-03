<div wire:init='loadPopularGames' class="popular-game text-sm grid lg:grid-cols-6 md:grid-cols-4 grid-cols-2 gap-12 border-b border-gray-800 pb-16">
    @forelse ($popularGames as $game)
        <x-game-card-big :game="$game" />
        @empty
        @foreach (range(1,12) as $game)
            <x-game-skeleton-big />
        @endforeach
    @endforelse
</div>