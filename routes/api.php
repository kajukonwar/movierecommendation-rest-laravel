<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//prefixed with api version
Route::prefix('v1')->group(function() {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login')->name('login');
    

    Route::resource('genres', 'GenreController');

    Route::get('movies/top_rated', 'API\MovieController@getTopRated');

    Route::get('movies/most_rated', 'API\MovieController@getMostRated');

    Route::apiResource('movies', 'API\MovieController')->only(['index', 'show']);

    Route::apiResource('countries', 'API\CountryController')->only('index', 'show');
    
    Route::middleware('auth:api')->group(function () {

        Route::resource('profile', 'ProfileController');
    });
    
});
