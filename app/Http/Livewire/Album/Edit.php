<?php

namespace App\Http\Livewire\Album;

use Livewire\Component;

class Edit extends Component
{

	public $album;
	public $title;
	public $description;
	public $picture;
	public $release_date;
	public $btnState;
	public $submit_string;
	public $header;

	protected $rules = [
            'title' => 'required|max:255|min:3',
        ];

    public function mount()
    {
    	$this->header = "Edit album: " . $this->album->title;
    	$this->submit_string = "Update";
        $this->btnState = "Hide picture";
        $this->title = $this->album->title;
        $this->picture = $this->album->picture;
        $this->description = $this->album->description;
        $this->release_date = $this->album->release_date;
    }


    public function render()
    {
        return view('livewire.album.edit');
    }

    public function submitForm()
	{
		$validatedData = $this->validate();

        $this->album->title = $this->title;
        $this->album->picture = $this->picture;
        $this->album->release_date = $this->release_date;
        $this->album->description = $this->description;
        $this->album->save();

        session()->flash('success_message','Album successfully updated');

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
