<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

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

Route::get('/tweets', [TweetController::class, 'index'])
    ->name('tweets.index');
Route::get('/tweets/create', [TweetController::class, 'create'])
    ->name('tweets.create');
Route::get('/tweets/{tweet}', [TweetController::class, 'show'])
    ->name('tweets.show')->where('tweet', '[0-9]+');
Route::post('/tweets/{tweet}/edit', [TweetController::class, 'edit'])
    ->name('tweets.edit')->where('tweet', '[0-9]+');
Route::patch('/tweets/{tweet}/update', [TweetController::class, 'update'])
    ->name('tweets.update')->where('tweet', '[0-9]+');
Route::delete('/tweets/{tweet}/delete', [TweetController::class, 'delete'])
    ->name('tweets.delete')->where('tweet', '[0-9]+');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
