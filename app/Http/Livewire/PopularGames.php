<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        $afterTwoMonths = Carbon::now()->addMonth(2)->timestamp;

        $query =    "fields slug, name, rating, first_release_date, platforms.abbreviation, cover.url, total_rating_count;
                    where platforms = (130, 6, 48, 49)
                    & (first_release_date >= {$beforeTwoMonths}
                    & first_release_date < {$afterTwoMonths}
                    & total_rating_count > 5);
                    sort total_rating_count desc;
                    limit 12;";

        $unformattedGames = Cache::remember('popular-games', 10, function () use ($query) {
            return Http::withHeaders(config('services.igdb.headers'))->withToken(getAccessToken())
            ->withBody($query, 'text/plain')->post(config('services.igdb.url').'/games')->json();
        });

        $this->popularGames = $this->formatForView($unformattedGames);

        collect($this->popularGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('popularGameRating', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png'),
                'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', ')  : "N/A",
                'rating' => isset($game['rating']) ? round($game['rating']) : null
            ]);
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
