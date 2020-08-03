<div wire:init='loadComingSoonGames' class="coming-soon-container space-y-10 mt-8">
    @forelse ($comingSoon as $game)
        <x-game-card-small :game="$game" />
        @empty
        @foreach (range(1,4) as $game)
            <x-game-skeleton-small />
        @endforeach
    @endforelse
</div>