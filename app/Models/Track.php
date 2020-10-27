<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    public function performers()
    {
    	return $this->hasMany('App\Models\Performer');
    }

    public function album()
    {
    	return $this->belongsTo('App\Models\Album');
    }
}
