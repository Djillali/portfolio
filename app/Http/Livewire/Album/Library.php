<?php

namespace App\Http\Livewire\Album;

use App\Models\Album;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Library extends Component
{
	public $search;

    public function render()
    {
        return view('livewire.album.library', [
			'albums' => Album::where('title','like','%' . $this->search . '%')->orWhereHas('tracks', function (Builder $query) {
                $query->whereHas('performers', function(Builder $query2) {
                    $query2->whereHas('artist', function(Builder $query3) {
                    	$query3->where('name','like','%' . $this->search . '%');
                	});
                });
            })->orderBy('created_at','desc')->paginate(4),

        ]);
    }
}
