<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giftag extends Model
{
    use HasFactory;

    public function gif()
    {
    	return $this->belongsTo('App\Models\Gif');
    }

    public function tag()
    {
    	return $this->belongsTo('App\Models\Tag');
    }
}
