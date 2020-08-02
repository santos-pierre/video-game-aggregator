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

    public function loadRecentlyReviewedGames () {
        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        $afterTwoMonths = Carbon::now()->addMonth(2)->timestamp;

        $query = "fields slug, storyline, name, summary, rating, first_release_date, platforms.abbreviation, cover.url;
                where platforms = (130, 6, 48, 49) 
                & (first_release_date >= {$beforeTwoMonths} & first_release_date <= {$afterTwoMonths} ) 
                & rating_count < 5;
                sort popularity desc;
                limit 3;";

        $unformattedGames = Cache::remember('recently-reviewed-gPames', 10, function () use($query) {
            return Http::withHeaders(config('services.igdb'))
            ->withOptions([
            'body' => $query
            ])->get('https://api-v3.igdb.com/games')->json();
        });

        $this->recentlyReviewed = $this->formatToView($unformattedGames);
    }

    private function formatToView ($games) {
        return collect($games)->map( function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png'),
                'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', ')  : "N/A",
                'rating' => isset($game['rating']) ? round($game['rating']).'%' : null,
                'summary' => isset($game['summary']) ? $game['summary'] : "No description for the moment",
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
