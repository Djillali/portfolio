<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = DB::table('artists')
                        ->orderBy('name','asc')
                        ->paginate(5);
        return view('music.artists.index', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('music.artists.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('music.artists.edit', ['artist' => $artist]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        Artist::destroy($artist->id);
        return redirect('/music/artists');
    }

    //Sets default value for picture property if empty.
    public function default_picture(Request $request)
    {
        if (empty($request->picture)) {
            return url('storage/images/default_person.png');
        }else{
            return $request->picture;
        }
    }

    public function export()
    {
        $artists = Artist::all();
        Storage::disk('public')->put('Artists.json',$artists->toJson());
        return Storage::download('public/Artists.json');
    }

    public function import()
    {
        $file = request()->filename;
        $filename = $file->getClientOriginalName();
        $file->storeAs('public',$filename);
        $jsonArtists = file_get_contents(storage_path('app/public/' . $filename));
        $artistsJson = json_decode($jsonArtists, true);
        $artists = Artist::hydrate($artistsJson);

        foreach ($artists as $artist){
            $search = Artist::where('id',$artist->id)->first();

            if($search === null){
                $artistNew = new Artist();
                $artistNew->id = $artist->id;
                $artistNew->name = $artist->name;
                $artistNew->country = $artist->country;
                $artistNew->picture = $artist->picture;
                $artistNew->description = $artist->description;
                $artistNew->date_of_birth = $artist->date_of_birth;
                $artistNew->date_of_death = $artist->date_of_death;
                $artistNew->save();
            }

        }

        return redirect('/music/artists');
    }
}
