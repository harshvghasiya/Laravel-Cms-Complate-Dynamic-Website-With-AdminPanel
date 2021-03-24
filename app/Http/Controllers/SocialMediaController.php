<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialmediaValidationRequest;
use App\social_media;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;                  


class SocialMediaController extends Controller
{
      function __construct()
    { 
        $apm_id=social_media::apm_id;
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
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_some')){
          return view('admin.social_media.addedit');
        }else{
            return redirect()->route('someListMain');
        }
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_upd(SocialmediaValidationRequest $request)
    {
       $id=$request->input('id');
       if ($id != null) {
           $res= social_media::find($id);
       }else{
        $res= new social_media;
       }

        $icon=$request->file('icon');
        if ($icon != null) {
        $exe=$icon->extension();
        $icon_name=time().'.'.$exe;
        $icon->storeAs('/public/socialmediaicon',$icon_name);
       }
       
        $res->title=$request->input('title');
        $res->url=$request->input('url');
        $res->icon=$icon_name;
        $res->status=$request->input('status');
        $res->save();
        $errors="";
        $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
    }


   public function some_datable()
    {
          $sql=social_media::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_some').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_some').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_some').'" id="del_some" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_some',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('icon', function($data){
                            return '<img src="'.asset("/public/storage/socialmediaicon/$data->icon").'" width="80px";
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
                 
                
                ->rawColumns(['status','handle','icon','id','created_by'])
            
                ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\social_media  $social_media
     * @return \Illuminate\Http\Response
     */
    public function show(social_media $social_media)
    {
        return view('admin.social_media.socialmedialist');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\social_media  $social_media
     * @return \Illuminate\Http\Response
     */
    public function edit(social_media $social_media,$id)
    { 
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_some')){
            $ids=Crypt::decrypt($id);
            $edit=social_media::find($ids);
            return view('admin.social_media.addedit',compact('edit'));
        }else{
           flashMessage('danger','Access Denied');
           return redirect()->route('someListMain');
        }

    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\social_media  $social_media
     * @return \Illuminate\Http\Response
     */
    public function update(SocialmediaValidationRequest $request)
    {
        $id=$request->input('id');
       
        $icon=$request->file('icon');
        $exe=$icon->extension();
        $icon_name=time().'.'.$exe;
        $icon->storeAs('/public/socialmediaicon',$icon_name);


        $res=social_media::find($id);
        $res->title=$request->input('title');
        $res->url=$request->input('url');
        $res->icon=$icon_name;
        $res->status=$request->input('status');
        $res->save();
           $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);

    }

     public function status_some(Request $request)
    {
        
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_some')){
           $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=social_media::find($status_id);
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
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_some')){
                $status_id=$request->input('status_id');
                // dd($status_id);
                foreach ($status_id as $value) {
          
                $res=social_media::find($value);
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
     * @param  \App\social_media  $social_media
     * @return \Illuminate\Http\Response
     */
    public function destroy(social_media $social_media,Request $request)
    {
       if(Allacceess(Auth::guard('adminlogin')->user()->id,'delete_some')){ 
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            social_media::destroy($del_id);
        }else{
             return 'accessdenied';
        }
    }

   public function del_all(social_media $social_media,Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_some')){
            $id=$request->input('del_id');
           foreach ($id as $key) {
             social_media::destroy($key);
           }
        }else{
            return 'accessdenied';
        }
    }
}
