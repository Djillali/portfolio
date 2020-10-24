<?php

namespace App\Http\Livewire\Track;

use Livewire\Component;

class Edit extends Component
{
	public $track;
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
    	$this->submit_string = "Update";
    	$this->title = $this->track->title;
    	$this->disc_number = $this->track->disc_number;
    	$this->position = $this->track->position;
    	$this->duration = $this->track->duration;
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

        $this->track->title = $this->title;
        $this->track->duration = $this->duration;
        $this->track->position = $this->position;
        $this->track->disc_number = $this->disc_number;
        $this->track->save();

        redirect('/music/albums/' . $this->track->album_id);
	}
}
