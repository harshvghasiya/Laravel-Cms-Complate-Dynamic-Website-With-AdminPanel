<?php

namespace App\Http\Controllers;

use App\Apdeledit;
use App\Http\Requests\BannerValidationRequest;
use App\banner;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class BannerController extends Controller
{
      function __construct()
    { 
        $apm_id=banner::apm_id;

        // $banner_slug=Apdeledit::where('module_id',$apm_id)->get();
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
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_banner')){
        return view('admin.banner.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('bannerListMain');
        }
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_upd(BannerValidationRequest $request)
    {
        $input=$request->all();
        $id=$request->input('id');
        if ($id != null) {
            $res=banner::find($id);
        }else{
            $res=new banner;
        }
        $image=$request->file('image');
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/bannerimage',$image_name);


        $res->name=$input['name'];
        $res->url=$input['url'];
        $res->status=$input['status'];
        $res->image=$image_name;
        $res->created_by=Auth::guard('adminlogin')->user()->id;
        $res->save();


        $errors="";
        $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        return view('admin.banner.bannerlist');
    }

    public function banner_datable()
    {
          
          $sql=banner::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_banner').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_banner').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data"  data-route="'.route('del_banner').'" id="del_banner" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_banner',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('image', function($data){
                            return '<img src="'.asset("/public/storage/bannerimage/$data->image").'" width="80px";
                                        height="60px";>';
                        })
                  ->editColumn('created_by', function($data){
                            if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        }) 
                 ->editColumn('id', function($data){
                            return '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                
                
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner,$id)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_banner')){

        $ids=Crypt::decrypt($id);
        $edit=banner::find($ids);
        return view('admin.banner.addedit',compact('edit'));

       }else{
           flashMessage('danger','Access Denied');
            return redirect()->route('bannerListMain');
       }
    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
    // public function update(BannerValidationRequest $request, banner $banner)
    // {
    //     $input=$request->all();
    //     $image=$request->file('image');
    //     if ($image != null) {
            
       
    //     $exe=$image->extension();
    //     $image_name=time().'.'.$exe;
    //     $image->storeAs('/public/bannerimage',$image_name);
    //     }
    //     $id=$input['id'];

    //     $res=banner::find($id);
    //     $res->name=$input['name'];
    //     $res->status=$input['status'];
    //     $res->url=$input['url'];
    //     $res->image=$image_name;
    //     $res->save();

    //     $errors="";
    //     $msg ="saved success.";
    //     return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    // }

    public function status_banner(Request $request)
    {
      if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_banner')){


            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=banner::find($status_id);
            if ($status=='Active') {
                $res->status='InActive';
                $res->save();
            }else{
                $res->status='Active';
                $res->save();
            }
       }else{

            return 'accessdenied';
       }
    }


    public function status_all(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_banner')) {
                $status_id=$request->input('status_id');
        
                foreach ($status_id as $value) {
                    
                    
                    $res=banner::find($value);
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



    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner,Request $request)
    {

     
       if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_banner')) {
        $id=$request->input('del_id');
        $del_id=Crypt::decrypt($id);
        banner::destroy($del_id);
        // $msg='Deleted Successfully';
       }else{
        return 'accessdenied';
       }
       
        // return flashMessage('success',$msg);

    }

     public function del_all(banner $banner,Request $request)
    {
       if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_banner')) {
           $id=$request->input('del_id');
           foreach ($id as $key) {
           banner::destroy($key);
           }
        }else{
            return 'accessdenied';
        }
    }
}
