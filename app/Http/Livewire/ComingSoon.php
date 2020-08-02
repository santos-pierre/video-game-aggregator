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

    public function loadComingSoonGames () {
        $current = Carbon::now()->timestamp;

        $query = "fields name, slug, first_release_date, cover.url;
                where platforms = (130, 6, 48, 49) 
                & first_release_date >= {$current};
                sort popularity desc;
                limit 4;";

        $unformattedGame = Cache::remember('coming-soon-games', 10, function () use($query) {
            return Http::withHeaders(config('services.igdb'))
            ->withOptions([
            'body' => $query
            ])->get('https://api-v3.igdb.com/games')->json();
        });

        $this->comingSoon = $this->formatToView($unformattedGame);
    }

    private function formatToView ($games) {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'first_release_date' => isset($game['first_release_date']) ? Carbon::parse($game['first_release_date'])->format('M d, Y') : "N/A",
                'coverImageUrl' => isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_small')->__toString() : asset('img/cover_small.png'),
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
