<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use App\Models\Performer;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = DB::table('albums')
                        ->orderBy('title','asc')
                        ->paginate(5);
        return view('music.albums.index', ['albums' => $albums]);
    }


    public function Library()
    {
        return view('music.albums.library');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('music.albums.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('music.albums.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('music.albums.edit', ['album' => $album]);
    }

    public function export()
    {
        $albums = Album::with('tracks','tracks.performers','tracks.performers.artist')->get();
        Storage::disk('public')->put('Albums.json',$albums->toJson());
        return Storage::download('public/Albums.json');
    }

    public function import()
    {
        $file = request()->filename;
        $filename = $file->getClientOriginalName();
        $file->storeAs('public',$filename);
        $jsonAlbum = file_get_contents(storage_path('app/public/' . $filename));
        $albumJson = json_decode($jsonAlbum, true);
        $albums = Album::hydrate($albumJson);

        $new_albums = collect();
        $new_tracks = collect();
        $new_artists = collect();

        foreach ($albums as $album){
            $search = Album::where('id',$album->id)->first();

            if($search === null){
                $new_album = new Album();
                $new_album->id = $album->id;
                $new_album->title = $album->title;
                $new_album->picture = $album->picture;
                $new_album->description = $album->description;
                $new_album->release_date = $album->release_date;
                $new_album->save();
                $new_albums->push($new_album);
            }

            $tracks = Track::hydrate($album->tracks);

            foreach ($tracks as $track) {
                $search = null;
                $search = Track::where('id',$track->id)->first();

                if($search === null){
                    $new_track = new Track();
                    $new_track->id = $track->id;
                    $new_track->album_id = $track->album_id;
                    $new_track->title = $track->title;
                    $new_track->disc_number = $track->disc_number;
                    $new_track->position = $track->position;
                    $new_track->duration = $track->duration;
                    $new_track->save();
                    $new_tracks->push($new_track);
                }

                $performers = Performer::hydrate($track->performers);

                foreach ($performers as $performer) {
                    $search = null;
                    $search = Performer::where('id',$performer->id)->first();

                    if($search === null){
                        $performerNew = new Performer();
                        $performerNew->id = $performer->id;
                        $performerNew->artist_id = $performer->artist_id;
                        $performerNew->track_id = $performer->track_id;
                        $performerNew->type = $performer->type;
                        $performerNew->save();
                    }
                    $artist = $performer->artist;

                    $search = null;
                    $search = Artist::where('id',$artist['id'])->first();

                    if($search === null){
                        $new_artist = new Artist();
                        $new_artist->id = $artist['id'];
                        $new_artist->name = $artist['name'];
                        $new_artist->picture = $artist['picture'];
                        $new_artist->date_of_death = $artist['date_of_death'];
                        $new_artist->date_of_birth = $artist['date_of_birth'];
                        $new_artist->save();
                        $new_artists->push($new_artist);
                    }
                }
            }
        }
        //redirct To RESULTS
        return view('imports.results', ['new_artists' => $new_artists, 'new_tracks' => $new_tracks, 'new_albums' => $new_albums]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        Album::destroy($album->id);
        return redirect('/music/albums');
    }
}
