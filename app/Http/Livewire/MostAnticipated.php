<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipatedGames()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;

        $query = "fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count, summary, slug;
                    where platforms = (48,49,130,6)
                    & (first_release_date >= {$current}
                    & first_release_date < {$afterFourMonths}
                    );
                    sort total_rating_count desc;
                    limit 4;";

        $mostAnticipatedGames = Cache::remember('most-anticipated-games', 10, function () use ($query) {
            return Http::withHeaders(config('services.igdb.headers'))
            ->withBody($query, 'text/plain')->post(config('services.igdb.endpoint'))->json();
        });


        $this->mostAnticipated = $this->formatToView($mostAnticipatedGames);
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
        return view('livewire.most-anticipated');
    }
}
