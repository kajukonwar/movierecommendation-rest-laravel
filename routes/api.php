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
    
    Route::middleware('auth:api')->group(function () {

        Route::resource('profile', 'ProfileController');
    });
    
});
