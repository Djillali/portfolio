<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public function tracks()
    {
    	return $this->hasMany('App\Models\Track');
    }


    public function getPerformersAttribute()
    {
    	$result = "";
    	foreach ($this->tracks as $track) {
    		foreach ($track->performers as $performer) {
    			if($performer->type == "main")
    			{
    				if(!Str::contains($result, $performer->artist->name))
    				{
    					if($result == "")
    					{
    						$result = $performer->artist->name;
    					}else{
    						$result .= " - " . $performer->artist->name;
    					}
    				}
    			}
    		}
    	}
    	return $result;
    }
}
