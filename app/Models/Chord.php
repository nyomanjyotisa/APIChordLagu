<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Chord extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public function comment(){
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'judul','penyanyi','level','genre',
        'durasi_menit', 'durasi_detik','chord_dan_lirik','created_at','updated_at'
    ];
}