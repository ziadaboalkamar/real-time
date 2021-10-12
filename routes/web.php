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
    return view('welcome');
});

Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');
Route::post('/comment','App\Http\Controllers\DashboardController@saveComment')->middleware(['auth'])->name('comment.save');

require __DIR__.'/auth.php';
