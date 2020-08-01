<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames () {
        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        $afterTwoMonths = Carbon::now()->addMonth(2)->timestamp;

        $query =    "fields slug, name, rating, first_release_date, platforms.abbreviation, cover.url;
                    where platforms = (130, 6, 48, 49) 
                    & (first_release_date >= {$beforeTwoMonths} & first_release_date <= {$afterTwoMonths} );
                    sort popularity desc;
                    limit 12;";

        $this->popularGames = Cache::remember('popular-games', 10, function () use($query) {
            return Http::withHeaders(config('services.igdb'))
            ->withOptions([
            'body' => $query
            ])->get('https://api-v3.igdb.com/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
