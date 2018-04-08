<?php

use Illuminate\Database\Console\Migrations\RollbackCommand;

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
    return redirect('/genres');
});
Route::get('/maintenance', 'MaintenanceController@index');
Route::get('/signup', 'SignupController@index');
Route::post('/signup', 'SignupController@signup');

Route::get('/login/twitter', 'LoginController@redirectToTwitter');
Route::get('/login/twitter/callback', 'LoginController@handleTwitterCallback');
Route::get('/login/github', 'LoginController@redirectToGitHub');
Route::get('/login/github/callback', 'LoginController@handleGitHubCallback');
Route::get('/login', 'LoginController@index');
Route::post('/tweets', 'TwitterController@store');
Route::get('/logout', 'LoginController@logout');
Route::get('/playlists', 'PlaylistsController@index');
Route::get('/playlists/new', 'PlaylistsController@create');
Route::get('/playlists/{id}', 'PlaylistsController@show');
Route::get('/settings', 'SettingsController@index');
Route::post('/settings/{id}', 'SettingsController@update');
Route::post('/playlists', 'PlaylistsController@store');
Route::get('/genres', 'GenresController@index');
Route::get('/artists/{id}/albums', 'ArtistsController@show');
Route::get('/artists', 'ArtistsController@index');
Route::get('/albums/{id}/reviews/new', 'AlbumsController@createReview');
Route::get('/albums/{id}/reviews', 'AlbumsController@show');
Route::post('/albums/{id}/reviews', 'AlbumsController@store');
Route::post('/tweet', 'TwitterController@store');

Route::middleware(['protected'])->group(function () {
    Route::get('/profile', 'AdminController@index');
    Route::get('/invoices', 'InvoicesController@index');
    Route::get('/invoices/{id}', 'InvoicesController@show');
    Route::get('/settings', 'SettingsController@index');
    Route::get('/phpinfo', function () {
        echo phpinfo();
    });
});

Route::middleware(['maintenance'])->group(function () {
    Route::get('/signup', 'SignupController@index');
    Route::post('/signup', 'SignupController@signup');
    Route::get('/playlists', 'PlaylistsController@index');
    Route::get('/playlists/new', 'PlaylistsController@create');
    Route::get('/playlists/{id}', 'PlaylistsController@show');
    Route::post('/playlists', 'PlaylistsController@store');
    Route::get('/genres', 'GenresController@index');
});

