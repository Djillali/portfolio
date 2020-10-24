<?php

namespace App\Http\Livewire\Import;

use Livewire\Component;

class Create extends Component
{
	public $discogs;


	protected $rules = [
            'discogs' => 'required|max:255|min:3',
        ];

    public function render()
    {
        return view('livewire.import.create');
    }

    public function submitForm()
	{
		$validatedData = $this->validate();

        redirect('/music/imports/discogs/' . $this->discogs);
	}

	public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}

}
