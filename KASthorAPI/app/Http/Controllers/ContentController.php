<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\MediaType;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Content();
        $content->creator = $request->input('creator');
        $content->creator = $request->input('provider');
        $content->creator = $request->input('summary');
        // $content->creator = $request('links');
        $type = MediaType::where('name', $request->input('mediatype_name'))->firstOrFail();
        $content->type()->associate($type);
        $categories_name = $request->input('categories_name');
        //à revoir changement suite à passage methode morphedBy()
        if ($categories_name != null && count($categories_name) != 0) {
            foreach ($categories_name as $category_name) {
                $category = Category::where('name', $category_name)->firstOrfail();
                $content->categories()->attach($category);
                $content->save();
            }
        }
    }

    public function all() {
        return Content::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
