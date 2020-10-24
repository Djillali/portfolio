<?php

namespace App\Http\Livewire\Album;

use App\Models\Album;
use Livewire\Component;

class Library extends Component
{
	public $search;

    public function render()
    {
        return view('livewire.album.library', [
        	'albums' => Album::where('title','like','%' . $this->search . '%')->orderBy('release_date','desc')->paginate(4),
        ]);
    }
}
