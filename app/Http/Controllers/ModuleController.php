<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleUpdValidationRequest;
use App\Http\Requests\ModuleValidationRequest;
use App\module;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class ModuleController extends Controller
{
      function __construct()
    { 
        $apm_id=module::apm_id;
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
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_module')) {    
          return view('admin.module.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('moduleListMain');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleValidationRequest $request)
    {
        $res=new module;
        $res->name=$request->input('name');
        $res->slug=$request->input('slug');
        $res->status=$request->input('status');
        $res->save();
          $errors="";
          $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(module $module)
    {
        return view('admin.module.modulelist');
    }


   public function module_datable()
    {
         $sql=module::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_module').'"  class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_module').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_module').'" id="del_module" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_module',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
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
     * @param  \App\module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(module $module,$id)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'edit_module')) {    
            $ids=Crypt::decrypt($id);
            $edit=module::find($ids);
            return view('admin.module.addedit',compact('edit'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('moduleListMain');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleUpdValidationRequest $request, module $module)
    {
        $id=$request->input('id');
        $res=module::find($id);
        $res->name=$request->input('name');
        $res->slug=$request->input('slug');
        $res->status=$request->input('status');
        $res->save();
         $errors="";
          $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

      public function status_module(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_module')) {    
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=module::find($status_id);
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
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_module')) {    
                $status_id=$request->input('status_id');
                // dd($status_id);
                foreach ($status_id as $value) {
          
                $res=module::find($value);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_module')) {    
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            
            module::destroy('id',$del_id);
        }else{
            return 'accessdenied';
        }
    }

     public function del_all(module $module,Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_module')) {    
                 $id=$request->input('del_id');
                foreach ($id as $key) {
                     module::destroy($key);
                }
        }else{
            return 'accessdenied';
        }
    }
}
