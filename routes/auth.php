<?php
use Illuminate\Support\Facades\Route;
Route::group(
    ['namespace' => 'App\Http\Controllers\Api\Auth', 'prefix' => 'auth'],
    static function () {
        Route::post('signup', 'AuthController@signUp');
        Route::post('signin', 'AuthController@signIn');
    }
);
