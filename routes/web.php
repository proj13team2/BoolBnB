<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Apartment;

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

// Route::get('/', function (Apartment $apartment) {
//     return view('home', compact('apartment'));
// });
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::prefix('user')->namespace('User')->name('user.')->middleware('auth')->group(function () {
    Route::get('/messages', 'MessageController@index')->name('apartments.messages');
    Route::get('apartment/stats/{apartment}', 'StatsController@index')->name('apartments.stats');
    Route::resource('/apartments', 'ApartmentController');
    Route::put('/apartments/{apartment}', 'ApartmentController@disable')->name('apartments.disable');
    /* BRAINTREE'S ROUTES */
    Route::get('apartment/sponsorization/{apartment}', 'SponsorController@show')->name('apartment.sponsorization');
    Route::post('apartment/sponsorization/{apartment}', 'SponsorController@checkout')->name('apartment.sponsorization');
});

Route::prefix('guest')->namespace('Guest')->name('guest.')->group(function () {
    Route::get('/apartment/{slug}', 'ApartmentController@show')->name('apartment.show');
    //OCCHIO
    Route::post('/message/{apartment}', 'MessageController@store')->name('message');
});
