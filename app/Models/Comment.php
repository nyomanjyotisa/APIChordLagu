<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function chord(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'id_user','id_chord','rating','comment',
        'created_at','updated_at'
    ];
}