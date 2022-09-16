<?php

use App\Http\Controllers\AlbumController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/albums', AlbumController::class)->middleware('auth');
Route::post('albums/{album}/upload', [AlbumController::class, 'upload'])->name('ablums.upload')->middleware('auth');
Route::get('/albums/{album}/image/{image}', [AlbumController::class, 'showImage'])->name('album.image.show');
Route::delete('/albums/{album}/image/{image}', [AlbumController::class, 'destroyImage'])->name('album.image.destroy');
Route::delete('albums/{album}/deleteallpictures',[AlbumController::class,'deleteallpictures'])->name('album.deleteallpictures');
Route::get('albums/{album}/moveallpictures',[AlbumController::class,'moveallpictures'])->name('album.moveallpictures');
Route::post('albums/{album}/movetoselectedalbum',[AlbumController::class,'movetoselectedalbum'])->name('album.movetoselectedalbum');
