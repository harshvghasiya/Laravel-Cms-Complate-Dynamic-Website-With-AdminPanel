<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogValidationRequest;
use App\blog_catagory;
use Illuminate\Http\Request;

class BlogCatagoryController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $catagory=$request->input('catagory');
        // $res=new blog_catagory;
        // $res->blog_catagory=$catagory;
        // $res->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog_catagory  $blog_catagory
     * @return \Illuminate\Http\Response
     */
    public function show(blog_catagory $blog_catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog_catagory  $blog_catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(blog_catagory $blog_catagory)
    {
        //
    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog_catagory  $blog_catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog_catagory $blog_catagory)
    {
        //
    }

    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\blog_catagory  $blog_catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog_catagory $blog_catagory)
    {
        //
    }
}
