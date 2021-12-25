<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChordController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\AuthController;
use App\Models\Chord;

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

    Route::get('user/{id}/detail', [AuthController::class, 'getPengguna']);
    Route::post('user/login', [AuthController::class, 'login']);
    Route::post('user/register', [AuthController::class, 'register']);
    Route::post('user/logout', [AuthController::class, 'logout']);
    Route::post('user/refresh', [AuthController::class, 'refresh']);
    Route::get('user/user-profile', [AuthController::class, 'userProfile']);    

    Route::get('chords', [ChordController::class, 'index']);
    Route::post('chords/store', [ChordController::class, 'store']);
    Route::post('chords/deleteuser', [ChordController::class, 'deleteUser']);
    Route::post('chords/user', [ChordController::class, 'indexUser']);
    
    Route::post('comments', [CommentController::class, 'index']);
    Route::post('comments/create', [CommentController::class, 'create']);

    Route::get('chords/{judul}',function($judul){
        $judul = isset($judul) ? trim($judul) : false;
        $query=Chord::where('judul', 'LIKE', '%'.$judul. '%')->get();
        return $query;
    })->where('judul', '^[a-zA-Z ]*$');