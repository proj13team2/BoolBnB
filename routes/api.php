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

Route::namespace('Api')->group(function() {
    Route::get('/search', 'SearchController@index');
    Route::get('/stamp', 'SearchController@stamp');
    Route::get('/filtered', 'SearchController@filtered');
    Route::get('/stats/messages/{apartment}', 'ChartApiController@messagesChart');
    Route::get('/stats/visualizations/{apartment}', 'ChartApiController@visualizationsChart');

});

// middleware('auth_api')
//Da finire CheckApiToken e creare api_token
