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

Route::controller(TweetController::class)->prefix('tweets')->name('tweet.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('tweet.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
