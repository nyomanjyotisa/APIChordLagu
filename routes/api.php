<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChordController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    

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
});
// Route::post('register', 'App\Http\Controllers\Api\AuthController@insertPengguna');
// Route::post('login', 'App\Http\Controllers\Api\AuthController@login');

// Route::post('register', 'AuthController@insertPengguna');

// Route::get('chords', [ChordController::class, 'index']);
// Route::post('chords/create', [ChordController::class, 'create']);
// Route::post('chords/update', [ChordController::class, 'update']);
// Route::post('chords/delete', [ChordController::class, 'delete']);


// Route::post('comments', [CommentController::class, 'index']);
// Route::post('comments/create', [CommentController::class, 'create']);

// //untuk ngambil semua chord dari user tertentu, parameter: id_user
// Route::post('chords/user', [ChordController::class, 'indexUser']);

// //untuk filter by genre, parameter: genre
// Route::post('chords/genre', [ChordController::class, 'indexGenre']);

// //untuk filter by level, parameter: level
// Route::post('chords/level', [ChordController::class, 'indexLevel']);

// //untuk search, parameter: keyword
// Route::post('chords/search', [ChordController::class, 'indexSearch']);