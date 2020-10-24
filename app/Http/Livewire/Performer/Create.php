<?php

namespace App\Http\Livewire\Performer;

use App\Models\Artist;
use App\Models\Performer;
use Livewire\Component;

class Create extends Component
{
	public $track;
	public $artists;
	public $type;
	public $artist_id;

	protected $rules = [
            'type' => 'required|max:255|min:2',
            'artist_id' => 'required',
        ];

	public function mount()
    {
        $this->artists = Artist::all();
    }

    public function render()
    {
        return view('livewire.performer.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
	{
		$validatedData = $this->validate();


        $performr = new Performer();
        $performr->type = $this->type;
        $performr->artist_id = $this->artist_id;
        $performr->track_id = $this->track->id;
        $performr->save();

        redirect('/music/albums/' . $this->track->album_id);
	}
}
