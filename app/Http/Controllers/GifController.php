<?php

namespace App\Http\Controllers;

use App\Models\Gif;
use App\Models\Giftag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gif.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function show(Gif $gif)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function edit(Gif $gif)
    {
        return view('gif.edit', ['gif' => $gif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gif $gif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gif  $gif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gif $gif)
    {
        foreach ($gif->giftags as $gifTag) {
            GifTag::destroy($gifTag->id);
        }

        Gif::destroy($gif->id);
        return redirect('gif');
    }

    public function destroyTag(Giftag $giftag)
    {
        $gif = $giftag->gif;
        Giftag::destroy($giftag->id);
        return redirect('gif/' . $gif->id . '/edit');
    }

    public function export()
    {
        $gifs = Gif::with('giftags','giftags.tag','user')->get();
        Storage::disk('public')->put('gifs.json',$gifs->toJson());
        return Storage::download('public/gifs.json');
    }

    public function import()
    {
        $file = request()->filename;
        $filename = $file->getClientOriginalName();
        $file->storeAs('public',$filename);
        $jsonGifs = file_get_contents(storage_path('app/public/' . $filename));
        $gifsJson = json_decode($jsonGifs, true);
        $gifs = Gif::hydrate($gifsJson);

        foreach ($gifs as $gif){
            $search = Gif::where('id',$gif->id)->first();

            if($search === null){
                $gifNew = new Gif();
                $gifNew->id = $gif->id;
                $gifNew->user_id = $gif->user_id;
                $gifNew->title = $gif->title;
                $gifNew->url = $gif->url;
                $gifNew->save();
            }
            $giftags = Giftag::hydrate($gif->gif_tags);

            foreach ($giftags as $giftag) {

                $search2 = Tag::where('tag',$giftag->tag['tag'])->first();


                if($search2 === null){
                    $tagNew = new Tag();
                    $tagNew->tag = $giftag->tag['tag'];
                    $tagNew->save();
                    $newTagId = $tagNew->id;
                    $search = null;
                }else{
                    $newTagId = $search2->id;
                    $search = Giftag::where('tag_id',$search2->id)->where('gif_id', $gif->id)->first();
                }

                 if($search === null){
                    $gifTagNew = new Giftag();
                    $gifTagNew->gif_id = $gif->id;
                    $gifTagNew->tag_id = $newTagId;
                    $gifTagNew->save();
                 }
            }
        }
        return redirect('/gif');
    }
}
