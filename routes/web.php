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

Route::get('/', function () { 
    return redirect('/movie');
});

Auth::routes();

Route::get('/movie', [App\Http\Controllers\movieController::class, 'index'])->name('home');
Route::post('movie/register', ['as' => 'movie.register', 'uses' => 'App\Http\Controllers\movieController@store']);
Route::post('movie/delete', ['as' => 'movie.delete', 'uses' => 'App\Http\Controllers\movieController@delete']);
Route::post('movie/update', ['as' => 'movie.update', 'uses' => 'App\Http\Controllers\movieController@update']);

