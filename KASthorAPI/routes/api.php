<?php

use App\Http\Resources\CategoryCollections;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Content;
use App\Services\PictureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categories', function () {
    return CategoryCollections::collection(Category::all());
});

Route::post('/categories/{name}', function ($name) {
     $category = new Category();
     $category->name= $name;
     $category->save();
});

Route::get('/test', function () {
    $tag = new Tag();
    $tag->value = 'testTag';
    $tag->save();
});
