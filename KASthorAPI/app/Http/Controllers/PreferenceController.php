<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use Illuminate\Http\Request;
use App\Models\Preference;

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
        //
    }

}
