<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->namespace('User')->name('user.')->middleware('auth')->group(function () {
    Route::get('/messages', 'MessageController@index')->name('apartments.messages');
    Route::get('/stats', 'StatsController@show')->name('apartments.stats');
    Route::resource('/apartments', 'ApartmentController');
});
