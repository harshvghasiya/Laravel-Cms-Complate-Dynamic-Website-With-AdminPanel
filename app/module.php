<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypt;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class module extends Model
{
	const apm_id ='10';

     public function cms()
    {
    	return $this->hasMany(cms::class,'module_id','id');
    }

       public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    public function createModule()
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_module')) {    
          return view('admin.module.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('moduleListMain');
        }
    }

    public function storeModule($request)
    {
        $id=$request->input('id');
        if(isset($id) && $id != null) {
           $res=module::find($id);
        }else{
           $res=new module; 
        }
    	
        $res->name=$request->input('name');
        $res->slug=$request->input('slug');
        $res->status=$request->input('status');
        $res->save();
          $errors="";
          $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);	
    }
    public function datableModule()
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

    public function editModule($id)
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

    public function statusModule($request)
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

    public function statusAllModule($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_module')) {    
                $status_id=$request->input('status_id');
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

    public function deleteModule($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_module')) {    
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            
            module::destroy('id',$del_id);
        }else{
            return 'accessdenied';
        }
    }

    public function deleteAllModule($request)
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
