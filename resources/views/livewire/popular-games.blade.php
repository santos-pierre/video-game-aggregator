<div wire:init='loadPopularGames' class="grid grid-cols-2 gap-12 pb-16 text-sm border-b border-gray-800 popular-game lg:grid-cols-6 md:grid-cols-4">
    @forelse ($popularGames as $game)
        <x-game-card-big :game="$game" />
        @empty
        @foreach (range(1,12) as $game)
            <x-game-skeleton-big />
        @endforeach
    @endforelse
</div>
