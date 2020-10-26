<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    use HasFactory;

    public function giftags()
    {
    	return $this->hasMany('App\Models\Giftag');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
