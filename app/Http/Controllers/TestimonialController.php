<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Http\Requests\TestimonialUpdRequest;
use App\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;

class TestimonialController extends Controller
{
      function __construct()
    { 
        $apm_id=testimonial::apm_id;
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
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_test')){
          return view('admin.testimonial.addedit');
        }else{
            flashMessage('danger','Access');
            return redirect()->route('testimonialListMain');
        }
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $res=new testimonial;
        $image=$request->file('image');
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/testimonialimage',$image_name);

        $res->name=$request->input('name');
        $res->role=$request->input('role');
        $res->about=$request->input('about');
        $res->status=$request->input('status');
        $res->image=$image_name;
        $res->save();
        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
        
        
    }
 public function datable()
    {
          $sql=testimonial::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_Testimonial').'"  class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_Testimonial').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){

                            return '<a class="btn btn-danger del_data" data-route="'.route('del_Testimonial').'" id="del_Testimonial" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_Testimonial',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('image', function($data){
                            return '<img src="'.asset("/public/storage/testimonialimage/$data->image").'" width="80px";
                                        height="60px";>';
                        })
                 ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        })
                 ->editColumn('id', function($data){
                            return  '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                 
                
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(testimonial $testimonial)
    {
        return view('admin.testimonial.testimoniallist');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(testimonial $testimonial,$id)
    { 
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_test')){    
            $eid=Crypt::decrypt($id);
            #dd($eid);
            $edit=testimonial::find($eid);
            return view('admin.testimonial.addedit',compact('edit'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('testimonialListMain');

        }
    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialUpdRequest $request, testimonial $testimonial)
    {
        $id=$request->input('id');
        $res=testimonial::find($id);
        $image=$request->file('image');
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/testimonialimage',$image_name);

        $res->name=$request->input('name');
        $res->role=$request->input('role');
        $res->about=$request->input('about');
        $res->status=$request->input('status');
        $res->about=$request->input('about');
        $res->image=$image_name;
        $res->save();

        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
     public function status_test(testimonial $testimonial,Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_test')){
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=testimonial::find($status_id);
            if ($status=='Active') {   
                $res->status="InActive";
                $res->save();
            }else{
                $res->status="Active";
                $res->save();
            }
        }else{
            return 'accessdenied';
        }
    }


    public function destroy(testimonial $testimonial,Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_test')){

            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            testimonial::destroy($del_id);
        }else{
            return 'accessdenied';
        }
    }

     public function status_all(testimonial $testimonial,Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_test')){    
             $id=$request->input('status_id');
            foreach ($id as $key) {
               $res=testimonial::find($key);

               if ($res->status=='Active') {
                  $res->status='InActive';
                  $res->save();
                }else{
                   $res->status='Active';
                   $res->save();
                }
            }
        }else{
            return 'accessdenied';
        }
    }


    public function del_all(testimonial $testimonial,Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_test')){
            $id=$request->input('del_id');
            foreach ($id as $key) {
              testimonial::destroy($key);
            }
        }else{
            return 'accessdenied';
        }
    }
}
