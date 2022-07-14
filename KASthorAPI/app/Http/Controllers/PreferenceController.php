<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\Universe;
use App\Models\Tag;
use App\Models\Content;
use App\Models\Category;
use App\Models\MediaType;

class PreferenceController extends RestControllerBase
{
    public function __construct() {
        parent::__construct(new Preference());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preference = new Preference();
        $preference->save();

        $universesFound = Universe::find($request->input('universe_ids',[]));
        if (count($universesFound) != 0) {
            $preference->universes()->attach($universesFound);
        }
        $tagsFound = Tag::find($request->input('tag_ids',[]));
        if (count($tagsFound) != 0) {
            $preference->tags()->attach($tagsFound);
        }
        $contentsFound = Content::find($request->input('content_ids', []));
        if (count($contentsFound) != 0) {
            $preference->contents()->attach($contentsFound);
        }
        $categoriesFound = Category::find($request->input('category_ids', []));
        if (count($categoriesFound) != 0) {
            $preference->categories()->attach($tagsFound);
        }
        $mediasFound = MediaType::find($request->input('media_ids', []));
        if (count($mediasFound) != 0) {
            $preference->types()->attach($mediasFound);
        }
    }

}
