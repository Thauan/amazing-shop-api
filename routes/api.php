<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    // Prefixed with /auth
    'prefix' => 'auth',
], function () {
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
});

Route::group([
    // Prefixed with /commodities
    'prefix' => 'commodities',
    'middleware' => 'api'
], function () {
    Route::resource('commodity', 'CommodityController');
});

Route::group([
    // Prefixed with /brands
    'prefix' => 'brands',
    'middleware' => 'api'
], function () {
    Route::resource('brand', 'BrandController');
});
