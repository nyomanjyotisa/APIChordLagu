<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Chord extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id', 'judul', 'penyanyi','level',
        'durasi','chord_dan_lirik','created_at','updated_at',
    ];
}