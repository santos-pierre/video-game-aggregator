<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ShowGame extends Component
{
    public $game = [];

    public function mount($slug){
        $query = "fields slug, name, storyline, summary, websites.url, videos.video_id,involved_companies.company.name, rating, platforms.abbreviation, genres.name, 
                screenshots.url, cover.url,
                similar_games.name, similar_games.platforms.name, similar_games.cover.url, similar_games.slug, similar_games.rating;
                where slug=\"{$slug}\";";

        $this->game = Http::withHeaders(config('services.igdb'))
            ->withOptions([
                'body' => $query
            ])->get('https://api-v3.igdb.com/games')->json();


        if (!$this->game) {
            return redirect()->to(abort(404));
        }
    }

    public function render()
    {
        return view('livewire.show-game');
    }
}
