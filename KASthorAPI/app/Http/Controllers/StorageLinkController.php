<?php

namespace App\Http\Controllers;

use App\Models\StorageLink;
use App\Models\MediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageLinkController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $storageLink = new StorageLink();
        $storageLink->link = $request->input('name');
        // $mediaType = MediaType::where('name', $request->input('mediatype_id'))->firstOrFail();
        // $storageLink->mediatype()->associate($mediaType);
        $storageLink->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StorageLink  $storageLink
     * @return \Illuminate\Http\Response
     */
    public function show(StorageLink $storageLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StorageLink  $storageLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StorageLink $storageLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StorageLink  $storageLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(StorageLink $storageLink)
    {
        //
    }
}
