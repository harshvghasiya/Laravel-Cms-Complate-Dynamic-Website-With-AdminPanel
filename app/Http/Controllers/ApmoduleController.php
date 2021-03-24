<?php

namespace App\Http\Controllers;

use App\Apm_user;
use App\apmodule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;

class ApmoduleController extends Controller
{
    function __construct()
    { 
        $apm_id=apmodule::apm_id;
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
       if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_apmodule')){
          return view('admin.AdminPanleModule.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('apmoduleListMain');
        }
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_update(Request $request)
    {
        // dd($request->all());
        $input=$request->all();
        $id=$request->input('id');
        if ( $id == null) {
            $res=new apmodule;
            $msg="Your Data Has Been Saved";
        }else{
            $res=apmodule::find($id);
            $msg="Your Data Has  Been Updated";
        }

        $res->name=$input['name'];
        $res->status=$input['status'];
        $res->save();
         
        flashMessage('success',$msg);
        $errors="";
        // $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\apmodule  $apmodule
     * @return \Illuminate\Http\Response
     */
    public function show(apmodule $apmodule)
    {
        return view('admin.AdminPanleModule.apmodulelist');
    }


     public function apmodule_datable()
    {
         $sql=apmodule::with(['apm_user_right','created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_apmodule').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{
                            return    '<a href="javascript:;" data-route="'.route('status_apmodule').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 
                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_apmodule').'" id="del_apmodule" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_apmodule',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                ->editColumn('id', function($data){
                     
                         return  '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        })
                
                ->rawColumns(['status','handle','id','created_by'])
            
                ->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\apmodule  $apmodule
     * @return \Illuminate\Http\Response
     */
    public function edit(apmodule $apmodule,Request $request,$id)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_apmodule')){
                $ids=Crypt::decrypt($id);
                $edit=apmodule::find($ids);
                return view('admin.AdminPanleModule.addedit',compact('edit'));
        }else{
            // return 'accessdenied';
            flashMessage('danger','Access Denied');
            return redirect()->route('apmoduleListMain');
        }

    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\apmodule  $apmodule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apmodule $apmodule)
    {
        //
    }

    public function status(Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_apmodule')){
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=apmodule::find($status_id);
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
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_apmodule')){
            $status_id=$request->input('status_id');
            // dd($status_id);
            foreach ($status_id as $value) {

                $res=apmodule::find($value);
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
     * @param  \App\apmodule  $apmodule
     * @return \Illuminate\Http\Response
     */
    public function destroy(apmodule $apmodule,Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_apmodule')){
            $id=Crypt::decrypt($request->input('del_id'));
            // dd($id);
            $sql=apm_user::where('apm_id',$id)->first();
            if ($sql != null) {
            return 'no';
            }else{
            apmodule::destroy($id);
            }
        }else{
            return 'accessdenied';
        }
    }

     public function del_all(Request $request)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_apmodule')){
            $id=$request->input('del_id'); 
            foreach ($id as $key) {
               $sql=apm_user::where('apm_id',$key)->first();
               if ($sql != null) {
                   return 'no';
               }else{
                   apmodule::destroy($key);
               }
           }
        }else{
            return 'accessdenied';
        }
    }
}
