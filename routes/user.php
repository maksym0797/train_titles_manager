<?php
use Illuminate\Support\Facades\Route;
Route::group(
    ['namespace' => 'App\Http\Controllers\Api\User', 'prefix' => 'users', 'middleware' => ['auth:api']],
    static function () {
        Route::put('titles/{title}/like', 'UserController@userLikeTitle');
    }
);
