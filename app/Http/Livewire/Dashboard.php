<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Gif;
use App\Models\Tag;
use App\Models\Track;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
	public $nbrUsers;
	public $nbrAlbums;
	public $nbrArtists;
	public $nbrTracks;
	public $nbrGifs;
	public $nbrTags;

	public function mount()
	{
		$users = User::all();
		$this->nbrUsers = $users->count();

		$albums = Album::all();
		$this->nbrAlbums = $albums->count();

		$artists = Artist::all();
		$this->nbrArtists = $artists->count();

		$tracks = Track::all();
		$this->nbrTracks = $tracks->count();

		$gifs = Gif::all();
		$this->nbrGifs = $gifs->count();

		$tags = Tag::all();
		$this->nbrTags = $tags->count();
	}
    public function render()
    {
        return view('livewire.dashboard');
    }
}
