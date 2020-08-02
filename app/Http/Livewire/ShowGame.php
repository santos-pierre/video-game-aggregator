<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ShowGame extends Component
{
    public $game = [];

    public function mount($slug){
        $query = "fields slug, name, storyline, summary, websites.url, videos.video_id,involved_companies.company.name, rating, platforms.abbreviation, genres.name, 
                screenshots.url, cover.url, aggregated_rating, 
                similar_games.name, similar_games.platforms.name, similar_games.cover.url, similar_games.slug, similar_games.rating;
                where slug=\"{$slug}\";";

        $unformattedGame = Http::withHeaders(config('services.igdb'))
            ->withOptions([
                'body' => $query
            ])->get('https://api-v3.igdb.com/games')->json();


        if (!$unformattedGame) {
            return redirect()->to(abort(404));
        }
            
        $this->game = $this->formatToView($unformattedGame[0]);

    }

    private function formatToView($game){
        
        return collect($game)->merge([
            'coverImageUrl' => isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png'),
            'genres' => isset($game['genres']) ? collect($game['genres'])->pluck('name')->filter()->implode(', ') : "No genres",
            'involved_companies' => isset($game['involved_companies']) ? collect($game['involved_companies'])->pluck('company.name')->implode(', ') : "No companies",
            'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', ') : "No platforms",
            'rating' => isset($game['rating']) ? Str::of(round($game['rating']))->append('%')->__toString() : 'N/A',
            'aggregated_rating' => isset($game['aggregated_rating']) ? Str::of(round($game['aggregated_rating']))->append('%')->__toString() : 'N/A',
            'summary' => isset($game['summary']) ? $game['summary'] : "No description for the moment",
            'screenshots' => isset($game['screenshots']) ? collect($game['screenshots'])->map(function ($screenshot) {
                    return [
                        'screenshot_huge' => Str::of($screenshot['url'])->replace('thumb', '1080p')->__toString(),
                        'screenshot_big' => Str::of($screenshot['url'])->replace('thumb', 'screenshot_big')->__toString()
                    ];
                })->take(9) : collect(['empty' => "No screenshots available for the moment"]),
            'similar_games' => isset($game['similar_games']) ? collect($game['similar_games'])->map(function ($similar_game) {
                return [
                    'name' => $similar_game['name'],
                    'coverImageUrl' => isset($similar_game['cover']['url']) ? Str::of($similar_game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png'),
                    'rating' => isset($similar_game['rating']) ? Str::of(round($similar_game['rating']))->append('%')->__toString() : 'N/A',
                    'platforms' => isset($similar_game['platforms']) ? collect($similar_game['platforms'])->pluck('name')->filter()->implode(', ') : "No platforms",
                    'slug' => $similar_game['slug']
                ];
            })->take(6) : collect(['empty' => "This game is currently an hipster game (joke)!"]),
        ])->toArray();
    }

    public function render()
    {
        return view('livewire.show-game');
    }
}