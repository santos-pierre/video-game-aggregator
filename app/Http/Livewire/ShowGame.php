<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ShowGame extends Component
{
    public $game = [];
    public $slug = '';

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function loadGame()
    {
        $query = "fields slug, name, storyline, summary, websites.url, videos.video_id,involved_companies.company.name, rating, platforms.abbreviation, genres.name,
                screenshots.url, cover.url, aggregated_rating,
                similar_games.name, similar_games.platforms.name, similar_games.cover.url, similar_games.slug, similar_games.rating;
                where slug=\"{$this->slug}\";";

        $unformattedGame = Http::withHeaders(config('services.igdb.headers'))->withBody($query, 'text/plain')->post(config('services.igdb.endpoint'))->json();


        if (!$unformattedGame) {
            return redirect()->to(abort(404));
        }

        $this->game = $this->formatToView($unformattedGame[0]);

        $this->emit('memberCritics', [
            'slug' => 'memberCritics',
            'rating' => $this->game['rating'] / 100
        ]);

        $this->emit('aggregatedCritics', [
            'slug' => 'aggregatedCritics',
            'rating' => $this->game['aggregated_rating'] / 100
        ]);

        collect($this->game['similar_games'])->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('similarGame', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });
    }

    private function formatToView($game)
    {
        return collect($game)->merge([
            'coverImageUrl' => isset($game['cover']['url']) ? Str::of($game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png'),
            'genres' => isset($game['genres']) ? collect($game['genres'])->pluck('name')->filter()->implode(', ') : "No genres",
            'involved_companies' => isset($game['involved_companies']) ? collect($game['involved_companies'])->pluck('company.name')->implode(', ') : "No companies",
            'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->filter()->implode(', ') : "No platforms",
            'rating' => isset($game['rating']) ? round($game['rating']) : null,
            'aggregated_rating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) : null,
            'summary' => isset($game['summary']) ? $game['summary'] : "No description for the moment",
            'screenshots' => isset($game['screenshots']) ? collect($game['screenshots'])->map(function ($screenshot) {
                return [
                        'screenshot_huge' => Str::of($screenshot['url'])->replace('thumb', '1080p')->__toString(),
                        'screenshot_big' => Str::of($screenshot['url'])->replace('thumb', 'screenshot_big')->__toString()
                    ];
            })->take(9) : collect(['empty' => "No screenshots available for the moment"]),
            'trailer' => isset($game['videos'][0]) ? 'https://youtube.com/embed/'.$game['videos'][0]['video_id'] : null,
            'similar_games' => isset($game['similar_games']) ? collect($game['similar_games'])->map(function ($similar_game) {
                return [
                    'name' => $similar_game['name'],
                    'coverImageUrl' => isset($similar_game['cover']['url']) ? Str::of($similar_game['cover']['url'])->replace('thumb', 'cover_big')->__toString() : asset('img/cover_big.png'),
                    'rating' => isset($similar_game['rating']) ? round($similar_game['rating']) : null,
                    'platforms' => isset($similar_game['platforms']) ? collect($similar_game['platforms'])->pluck('name')->filter()->implode(', ') : "No platforms",
                    'slug' => $similar_game['slug']
                ];
            })->take(6) : collect(['empty' => "This game is currently an hipster game (joke)!"]),
            'socials' => [
                'website' => $this->getSocialWebsiteUrl($game),
                'facebook' =>  $this->getSocialWebsiteUrl($game, 'facebook'),
                'twitter' => $this->getSocialWebsiteUrl($game, 'twitter'),
                'instagram' => $this->getSocialWebsiteUrl($game, 'instagram'),
            ],
        ]);
    }

    private function getSocialWebsiteUrl($game, $social=null)
    {
        if ($social) {
            $website = collect($game['websites'])->filter(function ($website) use ($social) {
                return Str::contains($website['url'], $social);
            })->first();
            if (isset($website['url'])) {
                return $website['url'];
            } else {
                return null;
            }
        } else {
            if (isset(collect($game['websites'])->first()['url'])) {
                return collect($game['websites'])->first()['url'];
            } else {
                return null;
            }
        }
    }

    public function render()
    {
        return view('livewire.show-game');
    }
}
