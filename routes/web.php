<?php

use App\Http\Controllers\ArtistController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Manage artists
Route::get('/music/artists', [ArtistController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('artists');
Route::get('/music/artists/create', [ArtistController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('artists.create');
Route::post('/music/artists', [ArtistController::class, 'store'])->middleware(['auth:sanctum', 'verified'])->name('artists.store');
Route::get('/music/artists/{artist}/edit', [ArtistController::class, 'edit'])->middleware(['auth:sanctum', 'verified'])->name('artists.edit');
Route::put('/music/artists/{artist}', [ArtistController::class, 'update'])->middleware(['auth:sanctum', 'verified'])->name('artists.update');
Route::delete('/music/artists/{artist}', [ArtistController::class, 'destroy'])->middleware(['auth:sanctum', 'verified'])->name('artists.destory');
