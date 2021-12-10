<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ChordController;
use Illuminate\Support\Facades\Route;

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

Route::post('chords/create','App\Http\Controllers\Api\ChordController@create');
Route::post('chords/update','App\Http\Controllers\Api\ChordController@update');
Route::post('chords/delete','App\Http\Controllers\Api\ChordController@delete');
Route::post('chords','App\Http\Controllers\Api\ChordController@post');