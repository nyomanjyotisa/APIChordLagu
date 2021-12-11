<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChordController;

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