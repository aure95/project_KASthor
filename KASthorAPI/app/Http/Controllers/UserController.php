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
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->birthdate = $request->input('birthdate');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        //'$user->preferences' = $request->input(preferences),
    }
}
