<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialUpdRequest;
use App\testimonial;
use Illuminate\Http\Request;


class TestimonialController extends Controller
{
      function __construct()
    { 
        $this->Model=new testimonial;
        $apm_id=testimonial::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
   
    public function create()
    {
        return $this->Model->createTestimonial();
    }

    public function store_update(TestimonialUpdRequest $request)
    {
       return $this->Model->saveTestimonial($request);        
    }

    public function datable()
    {
         return $this->Model->datableTestimonial();
    }

    public function show(testimonial $testimonial)
    {
        return view('admin.testimonial.testimoniallist');
    }

    public function edit(testimonial $testimonial,$id)
    { 
       return $this->Model->editTestimonial($id);
    }

    public function status_test(testimonial $testimonial,Request $request)
    {
       return $this->Model->statusTestimonial($request);
    }


    public function destroy(testimonial $testimonial,Request $request)
    {
       return $this->Model->deleteTestimonial($request);
    }

     public function status_all(testimonial $testimonial,Request $request)
    {
       return $this->Model->statusAllTestimonial($request);
    }


    public function del_all(testimonial $testimonial,Request $request)
    {
       return $this->Model->deleteAllTestimonial($request);
    }
}
