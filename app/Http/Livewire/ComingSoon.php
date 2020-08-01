<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoonGames () {
        $current = Carbon::now()->timestamp;

        $query = "fields name, slug, summary, rating, first_release_date, platforms.abbreviation, cover.url;
                where platforms = (130, 6, 48, 49) 
                & first_release_date >= {$current};
                sort popularity desc;
                limit 4;";

        $this->comingSoon = Cache::remember('coming-soon-games', 10, function () use($query) {
            return Http::withHeaders(config('services.igdb'))
            ->withOptions([
            'body' => $query
            ])->get('https://api-v3.igdb.com/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
