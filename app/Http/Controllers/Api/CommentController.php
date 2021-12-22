<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Request $request){
        $comments = Comment::where('id_chord', $request->id_chord)
            ->join('users', 'comments.id_user', '=', 'users.id')
            ->get();
        // dd($comments);
        return response()->json([
            'success'=>true,
            'data'=>$comments
        ]);
    }

    public function create(Request $request){
        $comment = new Comment;
        $comment->id_user = $request->id_user;
        $comment->id_chord = $request->id_chord;
        $comment->rating = $request->rating;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json([
            'success'=>true,
            'message'=>'Berhasil Menambahkan Data Comment',
            'data' => $comment,
        ]);
    }
}
