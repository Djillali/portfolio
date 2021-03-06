<?php

namespace App\Http\Livewire\Gif;

use App\Models\Gif;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
	public $search;

    public function render()
    {
    	$gifs = DB::table('gifs')
                        ->orderBy('title','asc')
                        ->paginate(10);

        return view('livewire.gif.index', [
            'gifs' => Gif::where('title','like','%' . $this->search . '%')->orWhereHas('gifTags', function (Builder $query) {
                $query->whereHas('tag', function(Builder $query2) {
                    $query2->where('tag','like','%' . $this->search . '%');
                });
            })->orderBy('created_at','desc')->paginate(4),
        ]);
    }
}
