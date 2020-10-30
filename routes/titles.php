<?php
use Illuminate\Support\Facades\Route;
Route::group(
    ['namespace' => 'App\Http\Controllers\Api\Titles', 'prefix' => 'titles'],
    static function () {
        Route::get('search', 'TitlesController@search');
    }
);
