<?php

namespace App\Http\Livewire\Gif;

use Livewire\Component;

class Edit extends Component
{
	public $gif;
	public $submit_string;
	public $title;
	public $url;
	public $tags;

    protected $rules = [
            'title' => 'required|max:255|min:3',
            'url' => 'required|url|max:255|min:3',
        ];

    public function mount()
    {
        $this->submit_string = "Edit";
        $this->title = $this->gif->title;
        $this->url = $this->gif->url;
    }

    public function render()
    {
        return view('livewire.gif.create');
    }

    public function submitForm()
	{
		$validatedData = $this->validate();

        $this->gif->title =  $this->title;
        $this->gif->url =  $this->url;
        $this->gif->save();

        redirect('/gif');
	}

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
