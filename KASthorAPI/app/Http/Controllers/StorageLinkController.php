<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use Illuminate\Http\Request;
use App\Models\StorageLink;

class StorageLinkController extends RestControllerBase
{
    public function __construct() {
        parent::__construct(new StorageLink());
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return StorageLink::all();
    // }

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
        $storageLink->name = $request->input('name');
        // $mediaType = MediaType::where('name', $request->input('mediatype_id'))->firstOrFail();
        // $storageLink->mediatype()->associate($mediaType);
        $storageLink->save();

    }

}
