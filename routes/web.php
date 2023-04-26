<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tweet\TweetController;

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
    Route::get('tweet/index', 'index')->name('index');
    Route::get('tweet/create', 'create')->name('create');
    Route::post('tweet/post', 'tweetPost')->name('post');
    Route::get('tweet/follow/{id}','follow')->name('follow');
    Route::get('tweet/unfollow/{id}', 'unfollow')->name('unfollow');
    Route::get('tweet/profile', 'profile')->name('profile');
    Route::get('tweet/user', 'user')->name('user');
    Route::post('tweet/update', 'update')->name('update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

