<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChordController;
use App\Http\Controllers\Api\CommentController;

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

Route::get('chords', [ChordController::class, 'index']);
Route::post('chords/create', [ChordController::class, 'create']);
Route::post('chords/update', [ChordController::class, 'update']);
Route::post('chords/delete', [ChordController::class, 'delete']);


Route::post('comments', [CommentController::class, 'index']);
Route::post('comments/create', [CommentController::class, 'create']);

//untuk ngambil semua chord dari user tertentu, parameter: id_user
Route::post('chords/user', [ChordController::class, 'indexUser']);

//untuk filter by genre, parameter: genre
Route::post('chords/genre', [ChordController::class, 'indexGenre']);

//untuk filter by level, parameter: level
Route::post('chords/level', [ChordController::class, 'indexLevel']);

//untuk search, parameter: keyword
Route::post('chords/search', [ChordController::class, 'indexSearch']);