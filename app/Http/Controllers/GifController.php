<?php

namespace App\Http\Controllers;

use App\Models\Gif;
use App\Models\Giftag;
use Illuminate\Http\Request;

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
        Gif::destroy($gif->id);
        return redirect('gif');
    }

    public function destroyTag(Giftag $giftag)
    {
        $gif = $giftag->gif;
        Giftag::destroy($giftag->id);
        return redirect('gif/' . $gif->id . '/edit');
    }
}
