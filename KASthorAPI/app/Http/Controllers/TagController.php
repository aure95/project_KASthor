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

//   /**
//      * Determine if the user is an administrator.
//      *
//      * @return bool
//      */
//     public function contents()
//     {
//         return $this->attributes['contents'] === 'yes';
//     }


     /**
    * Display a listing of the resource.
    * @var $page (requestParameter) specify pag number by page by value provided, default first page
    * @var $size (requestParameter) specify number of elements by page by value provided, default 10 elements
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $pageVariable = intval($request->query('page', '1'));
        $pageSizeVariable = intval($request->query('size', '10'));
        return $this->clazz->simplePaginate($pageSizeVariable, ['*'], '',$pageVariable);
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
