<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoonGames()
    {
        $current = Carbon::now()->timestamp;

        $query = "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary, slug;
        where platforms = (48,49,130,6)
        & (first_release_date >= {$current}
        );
        sort first_release_date asc;
        limit 4;";

        $unformattedGames = Cache::remember('coming-soon-games', 10, function () use ($query) {
            return Http::withHeaders(config('services.igdb.headers'))
            ->withBody(
                $query,
                "text/plain"
            )->post(config('services.igdb.endpoint'))
            ->json();
        });

        $this->comingSoon = $this->formatToView($unformattedGames);
    }

    private function formatToView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'first_release_date' => isset($game['first_release_date']) ? Carbon::parse($game['first_release_date'])->format('M d, Y') : "N/A",
                'coverImageUrl' => isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_small')->__toString() : asset('img/cover_small.png'),
            ]);
        });
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
