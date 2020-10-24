<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Import;
use App\Models\Performer;
use App\Models\Track;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($discogs)
    {
        $url = 'https://api.discogs.com/releases/' . $discogs;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result= curl_exec ($ch);
        curl_close ($ch);
        $discogs = json_decode($result, true);


        $new_artists = collect();

        $album = new Album();
        $album->title = $discogs['title'];
        $album->release_date = $discogs['released'];

        if(isset($discogs['notes']))
        {
            $album->description = $discogs['notes'];
        }

        $album->picture = url('storage/images/default_album.jpg');
        $album->save();

        $new_tracks = collect();

        foreach ($discogs['tracklist'] as $track) {
            $new_track = new Track();
            $new_track->album_id = $album->id;
            $new_track->title = $track['title'];
            $new_track->duration = $track['duration'];
            $new_track->position = $track['position'];
            $new_track->disc_number = 1; //TODO
            $new_track->save();

            foreach ($discogs['artists'] as $artist) {
                $new_artist = Artist::where('name','=', $artist['name'])->first();

                if($new_artist === null){
                    $new_artist = new Artist();
                    $new_artist->name = $artist['name'];
                    $new_artist->picture = url('storage/images/default_person.png');
                    $new_artist->save();
                    $new_artists->push($new_artist);
                }

                $performer = new Performer();
                $performer->type = 'main';
                $performer->artist_id = $new_artist->id;
                $performer->track_id = $new_track->id;
                $performer->save();
            }

            if (isset($track['extraartists'])) {
                foreach ($track['extraartists'] as $artist) {

                    if ($artist['role'] == "Featuring") {


                    $new_artist = Artist::where('name','=', $artist['name'])->first();

                    if($new_artist === null){
                        $new_artist = new Artist();
                        $new_artist->name = $artist['name'];
                        $new_artist->picture = url('storage/images/default_person.png');
                        $new_artist->save();
                        $new_artists->push($new_artist);
                    }


                    $performer = new Performer();
                    $performer->type = $artist['role'];
                    $performer->artist_id = $new_artist->id;
                    $performer->track_id = $new_track->id;
                    $performer->save();
                    }
                    }


                }
                $new_tracks->push($new_track);
            }


        return view('imports.results', ['new_artists' => $new_artists, 'new_tracks' => $new_tracks, 'album' => $album]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Import $import)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import $import)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        //
    }
}
