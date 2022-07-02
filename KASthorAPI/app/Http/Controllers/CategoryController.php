<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends RestControllerBase
{

    public function __construct() {
        parent::__construct(new Category());
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
    }

}
