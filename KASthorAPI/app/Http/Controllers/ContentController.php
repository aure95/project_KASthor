<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\MediaType;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\base\RestControllerBase;
use App\Models\StorageLink;

class ContentController extends RestControllerBase
{

    public function __construct() {
        parent::__construct(new Content());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Content();
        $content->title = $request->input('title');
        $content->creator = $request->input('creator');
        $content->provider = $request->input('provider');
        $content->summary = $request->input('summary');
        $content->links =  $request->input('links', []);
        $content->release_date = $request->input('release_date');

        $typeFound = MediaType::find($request->input('mediatype_id'));
        if ($typeFound != null) {
            $content->type()->associate($typeFound->first());
        }
        $userFound = User::find($request->input('user_id'));
        if ($userFound != null) {
            $content->createdBy()->associate($userFound->first());
        }
        // we have to save() before attach()
        $content->save();
        $mediasFound = StorageLink::find($request->input('media_ids', []));
        if (count($mediasFound) != 0) {
            $content->medias()->attach($mediasFound);
        }
        $categoriesFound = Category::find($request->input('categories_ids', []));
        if (count($categoriesFound) != 0) {
            $content->categories()->attach($categoriesFound);
        }

    }

}
