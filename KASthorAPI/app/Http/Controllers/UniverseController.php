<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use App\Models\Universe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Content;

class UniverseController extends RestControllerBase
{

    public function __construct() {
        parent::__construct(new Universe());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $universe = new Universe();
        $universe->name = $request->input('name');
        $universe->save();
        // contents
        $contentsFound = Content::find($request->input('content_ids', []));
        if (count($contentsFound) != 0) {
            $universe->contents()->attach($contentsFound);
        }

    }

}
