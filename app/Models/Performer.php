<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    use HasFactory;

    public function artist()
    {
    	return $this->belongsTo('App\Models\Artist');
    }

        public function album()
    {
    	return $this->belongsTo('App\Models\Album');
    }
}
