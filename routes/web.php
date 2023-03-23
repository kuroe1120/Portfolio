<?php

use Illuminate\Support\Facades\Route;
App\Http\Controllers\Admin\PortfolioController;

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

Route::get('/home', [App\Http\Controllers\PortfolioController::class, 'index'])->name('home');


Route::controller(PortfolioController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('portfolio/create', 'add')->name('portfolio.add');
    Route::post('portfolio/create', 'create')->name('portfolio.create');
    Route::get('portfolio', 'index')->name('portfolio.index');
    Route::get('portfolio/edit', 'edit')->name('portfolio.edit');
    Route::post('portfolio/edit', 'update')->name('portfolio.update');
    Route::get('portfolio/delete', 'delete')->name('portfolio.delete');
});
