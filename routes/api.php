<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('viewSongs', [SongController::class, 'viewSongs']);
Route::get('viewSpecificSong/{id}', [SongController::class, 'viewSpecificSong']);
Route::post('addSong', [SongController::class, 'addSong']);
Route::put('editSong/{id}', [SongController::class, 'editSong']);
Route::delete('deleteSong/{id}',[SongController::class, 'deleteSong']);