<?php

namespace App\Http\Controllers;

use App\BlogTag;
use App\Http\Requests\TagValidationRequest;
use App\Tag;

use Illuminate\Http\Request;


class TagController extends Controller
{
    function __construct()
    { 
        $this->Model=new Tag;
        $apm_id=BlogTag::apm_id;
        $this->middleware('access:'.$apm_id.'')->except('Front_Tag_Index'); 
    }

    public function create()
    { 
        return $this->Model->createTag();
    }

    public function store_update(TagValidationRequest $request)
    {
        return $this->Model->saveTag($request);
    }

    public function show(Tag $tag)
    {
        return view('admin.blog_tag.taglist');
    }

    public function tag_datable()
    {
        return $this->Model->datableTag();
    }

   
    public function edit(Tag $tag,$id)
    {
        return $this->Model->editTag($id);
    }

     public function status_tag(Request $request)
    {
       return $this->Model->statusTag($request);
    }

     public function destroy(Request $request)
    {
        return $this->Model->deleteTag($request);
    }

    public function del_all(Request $request)
    {
        return $this->Model->deleteAllTag($request);
    }


    public function status_all(Request $request)
    {
       return $this->Model->statusAllTag($request);
    }

    public function Front_Tag_Index($tag)
    {
        return $this->Model->frontTagIndex($tag);
    }
}
