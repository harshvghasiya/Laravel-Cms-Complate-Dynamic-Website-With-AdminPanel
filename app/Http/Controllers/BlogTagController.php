<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagValidationRequest;
use App\blog_tag;
use Crypt;
use Illuminate\Http\Request;
// use Illuminate\Http\Request\TagValidationRequest;
use Yajra\Datatables\Datatables;

class BlogTagController extends Controller
{
      function __construct()
    { 
        $apm_id=blog_tag::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog_tag  $blog_tag
     * @return \Illuminate\Http\Response
     */
    public function show(blog_tag $blog_tag)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog_tag  $blog_tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog_tag  $blog_tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagValidationRequest $request, blog_tag $blog_tag)
    {
       

    }

    




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog_tag  $blog_tag
     * @return \Illuminate\Http\Response
     */
  
}
