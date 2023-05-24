<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;


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

Route::controller(TweetController::class)->name('tweet.')->middleware('auth')->group(function () {
    Route::get('tweets', 'index')->name('index');
    Route::post('tweet/store', 'store')->name('store');
});

Route::controller(UserController::class)->name('user.')->middleware('auth')->group(function () {
    Route::get('users', 'index')->name('index');
    Route::get('user', 'show')->name('show');
    Route::post('update', 'update')->name('update');
});

Route::controller(FollowController::class)->middleware('auth')->group(function () {
    Route::get('follow/{id}','follow')->name('follow');
    Route::get('unfollow/{id}', 'unfollow')->name('unfollow');
});


