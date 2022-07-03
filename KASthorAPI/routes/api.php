<?php

use App\Http\Controllers\MediaTypeController;
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
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\CategoryController;


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

// Route::get('/categories', function () {
//     return Category::all();
// });

// Route::post('/categories/{name}', function ($name) {
//      $category = new Category();
//      $category->name= $name;
//      $category->save();
// });

// Route::get('/media-types', function () {
//     return MediaType::all();
// });

// Route::post('/media-types/{name}', function ($name) {
//      $category = new MediaType();
//      $category->name= $name;
//      $category->save();
// });

// Route::get('/test', function () {
//     $tag = new Tag();
//     $tag->name = 'testTag';
//     $tag->save();
// });

// storage-links

Route::post('/storage-links', 'StorageLinkController@store');
Route::get('/storage-links', 'StorageLinkController@index');
Route::get('/storage-links/{id}', 'StorageLinkController@show');
Route::put('/storage-links/{id}','StorageLinkController@update');
Route::delete('/storage-links/{id}', 'StorageLinkController@destroy');

// contents

Route::post('/contents', 'ContentController@store');
Route::get('/contents', 'ContentController@index');
Route::get('/contents/{id}', 'ContentController@show');
Route::put('/Content/{id}','ContentController@update');
Route::delete('/storage-links/{id}', 'ContentController@destroy');

// tags

Route::post('/tags', 'TagController@store');
Route::get('/tags', 'TagController@index');
Route::get('/tags/{id}', 'TagController@show');
Route::put('/tags/{id}','TagController@update');
Route::delete('/tags/{id}', 'TagController@destroy');

// universes

Route::post('/universes', 'UniverseController@store');
Route::get('/universes', 'UniverseController@index');
Route::get('/universes/{id}', 'UniverseController@show');
Route::put('/universes/{id}','UniverseController@update');
Route::delete('/universes/{id}', 'UniverseController@destroy');

// mediatypes

Route::post('mediatypes/', 'MediaTypeController@store');
Route::get('/mediatypes', 'MediaTypeController@index');
Route::get('/mediatypes/{id}', 'MediaTypeController@show');
Route::put('/mediatypes/{id}','MediaTypeController@update');
Route::delete('/mediatypes/{id}', 'MediaTypeController@destroy');

// categories

Route::post('/categories', 'CategoryController@store');
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::put('/categories/{id}','CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');

// preferences

Route::post('/preferences', 'PreferenceController@store');
Route::get('/preferences', 'PreferenceController@index');
Route::get('/preferences/{id}', 'PreferenceController@show');
Route::put('/preferences/{id}','PreferenceController@update');
Route::delete('/preferences/{id}', 'PreferenceController@destroy');

// users

Route::post('users/', 'UserController@store');
Route::get('/users', 'UserController@index');
Route::get('/users/{id}', 'UserController@show');
Route::put('/users/{id}','UserController@update');
Route::delete('/users/{id}', 'UserController@destroy');

//

