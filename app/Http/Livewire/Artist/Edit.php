<?php

namespace App\Http\Livewire\Artist;

use Livewire\Component;

class Edit extends Component
{
	public $artist;
	public $name;
	public $picture;
	public $description;
	public $country;
    public $date_of_birth;
    public $date_of_death;
    public $btnState;


	protected $rules = [
            'name' => 'required|max:255|min:3',
        ];

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

	public function submitForm()
	{
		$validatedData = $this->validate();

        $this->artist->name = $this->name;
        $this->artist->picture = $this->picture;
        $this->artist->date_of_birth = $this->date_of_birth;
        $this->artist->date_of_death = $this->date_of_death;
        $this->artist->country = $this->country;
        $this->artist->description = $this->description;
        $this->artist->save();

        session()->flash('success_message','Artist successfully updated');

        redirect('/music/artists');
	}

	public function search()
	{
		$this->picture = "test search google";
	}

    public function render()
    {
        return view('livewire.artist.edit', ['artist' => $this->artist]);
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

    public function mount()
    {
        $this->btnState = "Show picture";
    	$this->name = $this->artist->name;
    	$this->picture = $this->artist->picture;
    	$this->country = $this->artist->country;
    	$this->description = $this->artist->description;
        $this->date_of_birth = $this->artist->date_of_birth;
        $this->date_of_death = $this->artist->date_of_death;
    }
}
