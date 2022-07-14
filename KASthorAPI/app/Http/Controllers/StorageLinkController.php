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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storageLink = new StorageLink();
        $storageLink->name = $request->input('name');
        $storageLink->save();
    }

}
