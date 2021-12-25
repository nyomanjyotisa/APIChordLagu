<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chord;

class ChordController extends Controller
{
    public function index(Request $request){
        $chords = Chord::all();

        return $chords;
    }

    public function store(Request $request){
        $chord = new Chord;
        $chord->id = $request->id;
        $chord->id_user = $request->id_user;
        $chord->judul = $request->judul;
        $chord->penyanyi = $request->penyanyi;
        $chord->level = $request->level;
        $chord->genre = $request->genre;
        $chord->durasi_menit = $request->durasi_menit;
        $chord->durasi_detik = $request->durasi_detik;
        $chord->chord_dan_lirik = $request->chord_dan_lirik;
        $chord->save();

        return response()->json([
            'success'=>true,
            'message'=>'Berhasil Menambahkan Data Chord',
            'data' => $chord,
        ]);
    }

    public function indexUser(Request $request){
        $chords = Chord::where('id_user', $request->id_user)->get();

        return response()->json([
            'success'=>true,
            'data'=>$chords
        ]);
    }

    public function deleteUser(Request $request){
        $chord = Chord::where('id_user', $request->id_user)->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Berhasil Menghapus Data Chord User',
        ]);
    }
}
