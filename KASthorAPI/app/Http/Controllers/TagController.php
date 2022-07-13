<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Tag;
use App\Models\Content;
use Attribute;

class TagController extends RestControllerBase
{
    // protected $appends = ['contents'];

    public function __construct() {
        parent::__construct(new Tag());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        $contentsFound = Content::find($request->input('content_ids'));
        if (count($contentsFound) != 0) {
            $tag->contents()->attach($contentsFound);
        }
    }

}
