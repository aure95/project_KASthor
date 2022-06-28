<?php

use App\Http\Resources\CategoryCollections;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Content;
use App\Models\MediaType;
use App\Models\StorageLink;
use App\Services\PictureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StorageLinkController;
use App\Http\Controllers\TagController;

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
    return Category::all();
});

Route::post('/categories/{name}', function ($name) {
     $category = new Category();
     $category->name= $name;
     $category->save();
});

Route::get('/media-types', function () {
    return MediaType::all();
});

Route::post('/media-types/{name}', function ($name) {
     $category = new MediaType();
     $category->name= $name;
     $category->save();
});

Route::get('/test', function () {
    $tag = new Tag();
    $tag->name = 'testTag';
    $tag->save();
});

// storage-links

//don't work
#Route::resource('storage-links', StorageLink::class);
Route::post('/storage-links', 'StorageLinkController@store');
Route::get('/storage-links', 'StorageLinkController@index');
Route::delete('/storage-links/{id}', 'StorageLinkController@destroy');

// contents

Route::post('/contents', 'ContentController@store');
Route::get('/contents', 'ContentController@index');

// tags

Route::post('/tags', 'TagController@store');
Route::get('/tags', 'TagController@index');

