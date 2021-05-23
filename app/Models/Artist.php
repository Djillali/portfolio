<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Artist extends Model
{
    use HasFactory;


    //Calculate the age of the artist
    public function getAgeAttribute()
    {
    	if(!empty($this->attributes['date_of_birth']))
        {
            // If still alive
            if (empty($this->attributes['date_of_birth'])) {
                return Carbon::parse($this->attributes['date_of_birth'])->age;
            // if dead
            }else{
                return Carbon::parse($this->attributes['date_of_death'])->diff(Carbon::parse($this->attributes['date_of_birth']))->format('%y');
            }
        }else{
            return 0;
        }
    }


}
