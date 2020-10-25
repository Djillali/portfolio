<?php

namespace App\Http\Livewire\Gif;

use App\Models\Gif;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
	public $submit_string;
	public $title;
	public $url;
	public $tags;

	protected $rules = [
            'title' => 'required|max:255|min:3',
            'url' => 'required|url|max:255|min:3',
            'tags' => 'required',
        ];

    public function mount()
    {
        $this->submit_string = "Create";
    }

    public function render()
    {
        return view('livewire.gif.create');
    }

    public function submitForm()
	{
		$validatedData = $this->validate();

        $gif = new Gif();
        $gif->title = $this->title;
        $gif->url = $this->url;
        $gif->user_id = Auth::id();
        $gif->save();

        redirect('/gif');
	}

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
