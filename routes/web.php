<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index_site')->name('index_site');
Route::get('/laligafantasy', function () {
    return view('frontend.fantasy');
})->name('fantasy_site');
Route::get('/video/{slug}', 'HomeController@show_video')->name('show_video');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/verifyotp', function () {
    return view('backend.verify-otp');
    })->name('verify');
    Route::post('/verifyotp', 'OtpController@verifyOtp')->name('verifyOtp');
    Route::get('/users-list', 'ProfileController@user_list')->name('user_list');
    Route::resource('profile', 'ProfileController');
    // Route::get('/profile/list', 'ProfileController@users_list')->name('users_list');
    Route::get('/fantasy', 'FantasyController@index')->middleware('verified')->name('fantasy.index');
    Route::get('/fantasy/code', 'FantasyController@league_code')->middleware('verified')->name('fantasy.code');
    Route::post('/fantasy/code', 'FantasyController@store')->name('fantasy.store');
    Route::get('/mvideo/trashed', 'MvideoController@trashed')->name('mvideo.trashed');
    Route::get('/mvideo/restore/{id}', 'MvideoController@restore')->name('mvideo.restore');
    Route::delete('/mvideo/kill/{id}', 'MvideoController@kill')->name('mvideo.kill');
    Route::resource('mvideo', 'MvideoController')->middleware('verified'); 
    Route::patch('mvideo/publishnow/{mvideo}', 'MvideoController@update_published')->name('update_published');
    Route::resource('category', 'CategoryController')->middleware('verified');

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Auth::routes();
Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
