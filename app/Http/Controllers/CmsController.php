<?php

namespace App\Http\Controllers;

use App\Http\Requests\CmsUpdValidationRequest;
use App\Http\Requests\CmsValidationRequest;
use App\cms;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class CmsController extends Controller
{
      function __construct()
    { 
        $apm_id=cms::apm_id;
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
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_cms')) {    
 
          return view('admin.cms.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('cmsListMain');
        }   
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CmsValidationRequest $request)
    {
        $input=$request->all();

        $image=$request->file('image');
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/cmsimage',$image_name);


        $res=new cms;
        $res->name=$input['name'];
        $res->secondary_title=$input['secondary_title'];
        $res->display_on_header=$input['display_on_header'];
        $res->display_on_footer=$input['display_on_footer'];
        $res->status=$input['status'];
        $res->image=$image_name;
        if (isset($input['parent_id'])) {
             $res->parent_id=$input['parent_id'];
        }
        $res->created_by=Auth::guard('adminlogin')->user()->id;
        $res->module_id=$input['module'];
        $res->seo_title=$input['seo_title'];
        $res->seo_keyword=$input['seo_keyword'];
        $res->seo_description=$input['seo_description'];

        $res->short_description=$input['short_description'];
        $res->long_description=$input['long_description'];
        $res->save();

         $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function show(cms $cms)
    {
        return view('admin.cms.cmslist');
    }


    public function cms_datable()
    {
          
          $sql=cms::with(['module']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_cms').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_cms').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_cms').'" id="del_cms" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_cms',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('image', function($data){
                            return '<img src="'.asset("/public/storage/cmsimage/$data->image").'" width="80px";
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
                 ->editColumn('module', function($data){
                            return $data->module->name;
                        })
                
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function edit(cms $cms,$id)
    { 
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'edit_cms')) {    

                $ids=Crypt::decrypt($id);
                $edit=cms::find($ids);
                return view('admin.cms.addedit',compact('edit'));
        }else{
          flashMessage('danger','Acceess Denied');
          return redirect()->route('cmsListMain');
        }
    }

    public function status_cms(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_cms')) {    
 
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=cms::find($status_id);
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
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_cms')) {      
                $status_id=$request->input('status_id');
                // dd($status_id);
                foreach ($status_id as $value) {
          
                $res=cms::find($value);
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
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function update(CmsUpdValidationRequest $request, cms $cms)
    {
        $input=$request->all();
        $id=$input['id'];
        $res=cms::find($id);


       
        $image=$request->file('image');
        if ($image!=null) {
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/cmsimage',$image_name);
        $res->image=$image_name;
        }
        
       
        $res->name=$input['name'];
        $res->secondary_title=$input['secondary_title'];
        $res->display_on_header=$input['display_on_header'];
        $res->display_on_footer=$input['display_on_footer'];
        $res->status=$input['status'];
        
        $res->parent_id=$input['parent_id'];
        $res->module_id=$input['module'];
        $res->seo_title=$input['seo_title'];
        $res->seo_keyword=$input['seo_keyword'];
        $res->seo_description=$input['seo_description'];
          if (isset($input['parent_id'])) {
             $res->parent_id=$input['parent_id'];
        }
        $res->short_description=$input['short_description'];
        $res->long_description=$input['long_description'];
        $res->save();

        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function destroy(cms $cms,Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_cms')) {    
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            $sql=cms::where('parent_id',$del_id)->first();
            // dd($sql);
            if ($sql != Null) {
                return 'No';
                // exit();
            }else{
               cms::destroy($del_id);
            }
        }else{
            return 'accessdenied';
        }
            
    }

    public function del_all(Request $request)
    {
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_cms')) {    
            $id=$request->input('del_id');
            foreach ($id as $key) {
            $sql=cms::where('parent_id',$key)->first();
            if ($sql != null) {
                return 'no';
            }else{
             cms::destroy($key);
            }
           }
        }else{
            return 'accessdenied';
        }
    } 
    
}
