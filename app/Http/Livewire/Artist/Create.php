<?php

namespace App\Http\Livewire\Artist;

use App\Models\Artist;
use Livewire\Component;

class Create extends Component
{

	public $name;
	public $picture;
	public $description;
	public $country;
	public $date_of_birth;
	public $date_of_death;

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


        $artist = new Artist();
        $artist->name = $this->name;
        $artist->picture = $this->picture;
        $artist->date_of_birth = $date_of_birth;
        $artist->date_of_death = $date_of_death;
        $artist->country = $this->country;
        $artist->description = $this->description;
        $artist->save();

        session()->flash('success_message','Artist successfully created');

        redirect('/music/artists');
	}

    public function render()
    {
        return view('livewire.artist.create');
    }
}