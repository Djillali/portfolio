<?php

namespace App\Http\Livewire\Album;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Performer;
use App\Models\Track;

class Show extends Component
{

	public $album;
	public $description;
	public $read_state;


	public function mount()
	{
		$this->description = Str::limit($this->album->description, 1024, '(...)');
		$this->read_state = "Read more";
	}

    public function render()
    {
        return view('livewire.album.show');
    }

    public function read_more()
    {
    	if($this->read_state === "Read more"){
    		$this->read_state = "Read less";
    		$this->description = $this->album->description;
    	}else{
    		$this->read_state = "Read more";
    		$this->description = Str::limit($this->album->description, 1024, '(...)');
    	}
    }

    public function deletePerformer(Performer $performer)
    {
        $track = Track::find($performer->track_id);
        performer::destroy($performer->id);
        return redirect('/music/albums/' . $track->album_id);
    }
}
