<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatagoryUpdValidationRequest;
use App\Http\Requests\CatagoryValidationRequest;
use App\BlogCatagory;
use App\catagory;
use Illuminate\Http\Request;


class CatagoryController extends Controller
{
      function __construct()
    { 
        $this->Model=new catagory;
        $apm_id=BlogCatagory::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
   
    public function create()
    {
       return $this->Model->createCatagory();
    }

    public function store(CatagoryValidationRequest $request)
    {
        return $this->Model->storeCatagory($request);
    }
   
    public function show(catagory $catagory)
    {
        return view('admin.blog_catagory.catagorylist');
    }

    public function catagory_datable()
    {
      return $this->Model->catagoryDatable();
    }

    public function edit(catagory $catagory,$id)
    {
        return $this->Model->editCategory($id);
    }

    public function update(CatagoryUpdValidationRequest $request, catagory $catagory)
    {
       return $this->Model->updateCatagory($request);

    }

    public function status_catagory(Request $request)
    {
       return $this->Model->statusCatagory($request);
    }

    public function status_all(Request $request)
    {
        return $this->Model->statusAllCatagory($request);
    }

    public function destroy(Request $request)
    {
        return $this->Model->deleteCatagory($request);
    }

      public function del_all(catagory $catagory,Request $request)
    {
       return $this->Model->deleteAllCatagory($request);
    }
}
