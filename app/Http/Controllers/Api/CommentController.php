<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Request $request){
        $comments = Comment::where('id_chord', $request->id_chord)->get();
        // dd($comments);
        return response()->json([
            'success'=>true,
            'data'=>$comments
        ]);
    }
}
