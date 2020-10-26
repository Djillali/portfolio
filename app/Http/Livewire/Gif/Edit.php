<?php

namespace App\Http\Livewire\Gif;

use App\Models\Gif;
use App\Models\GifTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $gif;
    public $tags;
    public $submit_string;
    public $header;
    public $title;
    public $url;
    public $tag;

    protected $rules = [
            'title' => 'required|max:255|min:3',
            'url' => 'required|url|max:255|min:3',
        ];

    public function mount()
    {
        $this->submit_string = "Edit";
        $this->header = "Edit gif";
        $this->title = $this->gif->title;
        $this->url = $this->gif->url;
        $this->tags = $this->gif->gifTags;
    }

    public function render()
    {

        $gifs = Gif::all();

        return view('livewire.gif.edit', ["gifs" => $gifs]);
    }

    public function submitForm()
    {
        $validatedData = $this->validate();

        $this->gif->title =  $this->title;
        $this->gif->url =  $this->url;
        $this->gif->save();

        redirect('/gif');
    }


    public function addTag()
    {
        $tag = Tag::where('tag','=', $this->tag)->first();
        if($tag === null){
            $tag = new Tag();
            $tag->tag = $this->tag;
            $tag->save();
        }

        $gifTag = new GifTag();
        $gifTag->gif_id = $this->gif->id;
        $gifTag->tag_id = $tag->id;
        $gifTag->save();
        redirect('gif/' . $this->gif->id . '/edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
