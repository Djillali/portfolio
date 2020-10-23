<?php

namespace App\Http\Livewire\Album;

use App\Models\Album;
use Livewire\Component;

class Create extends Component
{
	public $title;
	public $picture;
	public $description;
	public $release_date;
    public $btnState;
    public $submit_string;
    public $header;

	protected $rules = [
            'title' => 'required|max:255|min:3',
        ];

    public function mount()
    {
        $this->header = "Manually add a new album: ";
        $this->submit_string = "Create";
        $this->btnState = "Hide picture";
    }

    public function render()
    {
        return view('livewire.album.edit');
    }

	public function submitForm()
	{
		$validatedData = $this->validate();


        $album = new Album();
        $album->title = $this->title;
        $album->picture = $this->picture;
        $album->release_date = $this->release_date;
        $album->description = $this->description;
        $album->save();

        session()->flash('success_message','Album successfully created');

        redirect('/music/albums');
	}

    public function btnState()
    {
        if($this->btnState === "Show picture")
        {
            $this->btnState = "Hide picture";
        }else{
            $this->btnState = "Show picture";
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
