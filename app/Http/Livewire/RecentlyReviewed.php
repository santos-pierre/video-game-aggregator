<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewedGames()
    {
        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        $afterTwoMonths = Carbon::now()->addMonth(2)->timestamp;

        $query = "fields slug, storyline, name, summary, rating, first_release_date, platforms.abbreviation, cover.url, total_rating_count;
                where platforms = (130, 6, 48, 49)
                & (first_release_date >= {$beforeTwoMonths} & first_release_date <= {$afterTwoMonths} )
                & rating_count < 5;
                sort total_rating_count desc;
                limit 3;";

        $unformattedGames = Cache::remember('recently-reviewed-games', 10, function () use ($query) {
            return Http::withHeaders(config('services.igdb.headers'))->withToken(getAccessToken())
            ->withBody($query, 'text/plain')->post(config('services.igdb.endpoint'))->json();
        });

        $this->recentlyReviewed = $this->formatToView($unformattedGames);

        collect($this->recentlyReviewed)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('reviewedGameRating', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });
    }

    private function formatToView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png'),
                'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', ')  : "N/A",
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'summary' => isset($game['summary']) ? $game['summary'] : "No description for the moment",
            ]);
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
