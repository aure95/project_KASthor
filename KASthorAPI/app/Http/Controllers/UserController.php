<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends RestControllerBase
{
    public function __construct() {
        parent::__construct(new User());
    }

    public function store(Request $request) {
        //
    }
}
