<?php

namespace App\Http\Livewire\Gif;

use App\Models\Gif;
use App\Models\Tag;
use App\Models\GifTag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $header;
    public $submit_string;
    public $title;
    public $url;

    protected $rules = [
            'title' => 'required|max:255|min:3',
            'url' => 'required|url|max:255|min:3',
        ];

    public function mount()
    {
        $this->header = "Add new gif";
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
