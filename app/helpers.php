<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

if (!function_exists('getAccessToken')) {
    function getAccessToken()
    {
        if (!Cache::has('IGDB_ACCESS_TOKEN')) {
            $response = Http::post('https://id.twitch.tv/oauth2/token', [
                'client_id' => env('IGDB_CLIENT_ID'),
                'client_secret' => env('IGDB_SECRET'),
                'grant_type' => 'client_credentials'
            ])->json();
            Cache::add('IGDB_ACCESS_TOKEN', $response, $response["expires_in"]);
        }

        return collect(Cache::get('IGDB_ACCESS_TOKEN'))->get('access_token');
    }
}
