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
        // return response()->json([
        //     // 'success'=>true,
        //     'data'=>$chords
        // ]);
    }

    public function create(Request $request){
        $chord = new Chord;
        $chord->id_user = 1;
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

    public function update(Request $request){
        $chord = Chord::find($request->id);
        $chord->judul = $request->judul;
        $chord->penyanyi = $request->penyanyi;
        $chord->level = $request->level;
        $chord->genre = $request->genre;
        $chord->durasi_menit = $request->durasi_menit;
        $chord->durasi_detik = $request->durasi_detik;
        $chord->chord_dan_lirik = $request->chord_dan_lirik;
        $chord->update();

        return response()->json([
            'success'=>true,
            'message'=>'Berhasil Mengedit Data Chord',
            'data' => $chord,
        ]);
    }

    public function delete(Request $request){
        $chord = Chord::find($request->id);
        $chord->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Berhasil Menghapus Data Chord',
        ]);
    }

    public function indexUser(Request $request){
        $chords = Chord::where('id_user', $request->id_user)->get();

        return response()->json([
            'success'=>true,
            'data'=>$chords
        ]);
    }

    public function indexGenre(Request $request){
        $chords = Chord::where('genre', 'LIKE', '%'.$request->genre.'%')->get();

        return response()->json([
            'success'=>true,
            'data'=>$chords
        ]);
    }

    public function indexLevel(Request $request){
        $chords = Chord::where('level', $request->level)->get();

        return response()->json([
            'success'=>true,
            'data'=>$chords
        ]);
    }

    public function indexSearch(Request $request){
        $chords = Chord::where('judul', 'LIKE', '%'.$request->keyword.'%')
                        ->orWhere('penyanyi', 'LIKE', '%'.$request->keyword.'%')
                        ->get();

        return response()->json([
            'success'=>true,
            'data'=>$chords
        ]);
    }
}
