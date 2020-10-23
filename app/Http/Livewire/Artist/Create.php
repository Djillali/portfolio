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
    public $btnState;
    public $submit_string;
    public $header;

    protected $rules = [
            'name' => 'required|max:255|min:3',
        ];

    public function mount()
    {
        $this->btnState = "Hide picture";
        $this->header = "Manually add a new artist";
        $this->submit_string = "Create";
    }

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
        $artist->date_of_birth = $this->date_of_birth;
        $artist->date_of_death = $this->date_of_death;
        $artist->country = $this->country;
        $artist->description = $this->description;
        $artist->save();

        session()->flash('success_message','Artist successfully created');

        redirect('/music/artists');
    }

    public function render()
    {
        return view('livewire.artist.edit');
    }


}
