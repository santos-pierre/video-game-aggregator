<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipatedGames () {
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;

        $query = "fields slug, name,rating,first_release_date,platforms.abbreviation,cover.url;
                where platforms = (130, 6, 48, 49) 
                & (first_release_date >= {$current} & first_release_date <= {$afterFourMonths} );
                sort popularity desc;
                limit 4;";

        $this->mostAnticipated = Cache::remember('most-anticipated-games', 10, function () use($query) {
            return Http::withHeaders(config('services.igdb'))
            ->withOptions([
            'body' => $query
            ])->get('https://api-v3.igdb.com/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
