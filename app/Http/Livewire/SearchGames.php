<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchGames extends Component
{
    public $search = '';
    public $gamesResult = [];

    public function updatedSearch () {
        $query = "
                    search \"{$this->search}\";
                    fields name, slug, first_release_date, cover.url;
                    limit 6;
                ";

        $this->gamesResult = Http::withHeaders(config('services.igdb.headers'))
            ->withBody($query, 'text/plain')->post(config('services.igdb.endpoint'))->json();
    }

    public function render()
    {
        return view('livewire.search-games');
    }
}
