<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index () {
        // $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        // $afterTwoMonths = Carbon::now()->addMonth(2)->timestamp;
        // $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;
        // $current = Carbon::now()->timestamp;

        // $popularGames = Http::withHeaders(config('services.igdb'))
        // ->withOptions([
        // 'body' => "
        //     fields name,rating,first_release_date,platforms.abbreviation,cover.url;
        //     where
        //         platforms = (130, 6, 48, 49) & 
        //         (first_release_date >= {$beforeTwoMonths} & first_release_date <= {$afterTwoMonths} )
        //     ;
        //     sort popularity desc;
        //     limit 12;
        // "])->get('https://api-v3.igdb.com/games')->json();
        

        // $recentlyReviewed = Http::withHeaders(config('services.igdb'))
        // ->withOptions([
        // 'body' => "
        //     fields name,summary,rating,first_release_date,platforms.abbreviation,cover.url;
        //     where
        //         platforms = (130, 6, 48, 49) & 
        //         (first_release_date >= {$beforeTwoMonths} & first_release_date <= {$afterTwoMonths} ) &
        //         rating_count < 5
        //     ;
        //     sort popularity desc;
        //     limit 3;
        // "])->get('https://api-v3.igdb.com/games')->json();

        // $mostAnticipated = Http::withHeaders(config('services.igdb'))
        // ->withOptions([
        // 'body' => "
        //     fields name,rating,first_release_date,platforms.abbreviation,cover.url;
        //     where
        //         platforms = (130, 6, 48, 49) & 
        //         (first_release_date >= {$current} & first_release_date <= {$afterFourMonths} )
        //     ;
        //     sort popularity desc;
        //     limit 4;
        // "])->get('https://api-v3.igdb.com/games')->json();

        // $comingSoon = Http::withHeaders(config('services.igdb'))
        // ->withOptions([
        // 'body' => "
        //     fields name,summary,rating,first_release_date,platforms.abbreviation,cover.url;
        //     where
        //         platforms = (130, 6, 48, 49) & 
        //         first_release_date >= {$current}
        //     ;
        //     sort popularity desc;
        //     limit 4;
        // "])->get('https://api-v3.igdb.com/games')->json();

        // return view('index', compact('mostAnticipated'));
    } 
}
