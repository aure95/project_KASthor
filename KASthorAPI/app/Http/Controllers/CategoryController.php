<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryCollection;

class CategoryController extends RestControllerBase
{

    public function __construct() {
        parent::__construct(new Category());
    }


    // public function index(Request $request)
    // {
    //     $pageVariable = intval($request->query('page', '1'));
    //     $pageSizeVariable = intval($request->query('size', '10'));
    //     // return $this->clazz->simplePaginate($pageSizeVariable, ['*'], '',$pageVariable);
    //     return CategoryCollection::collection(Category::simplePaginate($pageSizeVariable, ['*'], '',$pageVariable));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
    }

}
