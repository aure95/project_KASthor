<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\RestControllerBase;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Preference;

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

        $preferenceFound = Preference::find($request->input('preference_id'));
        if ($preferenceFound != null) {
            $user->preference()->associate($preferenceFound->first());
        }
        $user->save();
    }
}
