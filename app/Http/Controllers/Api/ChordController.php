<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chord;

class ChordController extends Controller
{
    public function create(Request $request){
        $chord = new Chord;
        $chord->user_id = 1;
        $chord->judul = $request->judul;
        $chord->penyanyi = $request->penyanyi;
        $chord->level = $request->level;
        $chord->durasi = $request->durasi;
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
        // if(Auth::user()->id != $chord->user_id){
        if(1 != $chord->user_id){
            return response()->json([
                'success'=>false,
                'message'=>'Unauthorized Access!'
            ]);
        }

        $chord->judul = $request->judul;
        $chord->penyanyi = $request->penyanyi;
        $chord->level = $request->level;
        $chord->durasi = $request->durasi;
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
        $val = Chord::onlyTrashed()->find($request->id);
        if($val!=null){
            return response()->json([
                'success'=>false,
                'message'=>'Data not found!'
            ]);
        }else{
            if(Auth::user()->id != $chord->user_id){
                return response()->json([
                    'success'=>false,
                    'message'=>'Unauthorized Access!'
                ]);
            }
            $chord->delete();
            return response()->json([
                'success'=>true,
                'message'=>'Berhasil Menghapus Data Chord',
            ]);
        }
    }
}
