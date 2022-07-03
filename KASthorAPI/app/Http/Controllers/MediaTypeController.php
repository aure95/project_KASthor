<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use App\Models\MediaType;
use Illuminate\Http\Request;

class MediaTypeController extends RestControllerBase
{
    public function __construct() {
        parent::__construct(new MediaType());
    }

    public function store(Request $request) {
        $mediatype = new MediaType();
        $mediatype->name = $request->input('name');
        $mediatype->save();
    }

}
