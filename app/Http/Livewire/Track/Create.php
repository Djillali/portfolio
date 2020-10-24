<?php

namespace App\Http\Livewire\Track;

use App\Models\Track;
use Livewire\Component;

class Create extends Component
{
	public $album;
	public $title;
	public $disc_number;
	public $position;
	public $duration;
	public $submit_string;

	protected $rules = [
            'title' => 'required|max:255|min:3',
        ];

	public function mount()
    {
    	$this->submit_string = "Create";
    }

    public function render()
    {
        return view('livewire.track.create');
    }

    public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function submitForm()
	{
		$validatedData = $this->validate();


        $track = new Track();
        $track->title = $this->title;
        $track->duration = $this->duration;
        $track->position = $this->position;
        $track->disc_number = $this->disc_number;
        $track->album_id = $this->album->id;
        $track->save();


        redirect('/music/albums/' . $this->album->id);
	}
}
