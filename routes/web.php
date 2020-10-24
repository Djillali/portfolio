<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PerformerController;
use App\Http\Controllers\TrackController;
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
Route::get('/music/artists/export', [ArtistController::class, 'export'])->middleware(['auth:sanctum', 'verified'])->name('artists.export');
Route::post('/music/artists/import', [ArtistController::class, 'import'])->middleware(['auth:sanctum', 'verified'])->name('artists.import');
Route::get('/music/artists/{artist}/edit', [ArtistController::class, 'edit'])->middleware(['auth:sanctum', 'verified'])->name('artists.edit');
Route::put('/music/artists/{artist}', [ArtistController::class, 'update'])->middleware(['auth:sanctum', 'verified'])->name('artists.update');
Route::delete('/music/artists/{artist}', [ArtistController::class, 'destroy'])->middleware(['auth:sanctum', 'verified'])->name('artists.destory');

//Manage albums
Route::get('/music/albums', [AlbumController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('albums');
Route::get('/music/albums/create', [AlbumController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('albums.create');
Route::get('/music/albums/{album}', [AlbumController::class, 'show'])->middleware(['auth:sanctum', 'verified'])->name('albums.show');
Route::get('/music/albums/{album}/edit', [AlbumController::class, 'edit'])->middleware(['auth:sanctum', 'verified'])->name('albums.edit');
Route::delete('/music/albums/{album}', [AlbumController::class, 'destroy'])->middleware(['auth:sanctum', 'verified'])->name('albums.destory');

//Manage tracks
Route::get('/music/albums/{album}/tracks/create', [TrackController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('albums.tracks.create');
Route::get('/music/tracks/{track}/edit', [TrackController::class, 'edit'])->middleware(['auth:sanctum', 'verified'])->name('albums.tracks.edit');
Route::delete('/music/tracks/{track}', [TrackController::class, 'destroy'])->middleware(['auth:sanctum', 'verified'])->name('albums.tracks.destory');

//Manage performers
Route::get('/music/tracks/{track}/performers/create', [PerformerController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('albums.tracks.performers.create');
