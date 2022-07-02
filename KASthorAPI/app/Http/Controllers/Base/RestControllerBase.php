<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Jenssegers\Mongodb\Eloquent\Model;

abstract class RestControllerBase extends Controller
{
    //@var Jenssegers\Mongodb\Eloquent\Model
    protected $clazz;

    function __construct(Object $clazz) {

        $this->clazz = $clazz;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return $this->clazz->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public abstract function store(Request $request);

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->clazz->findOrFail($id);
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
        $this->clazz->findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->clazz->findOrFail($id)
                        ->delete();
    }
}
