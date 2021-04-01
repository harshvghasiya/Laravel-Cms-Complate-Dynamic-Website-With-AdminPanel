<?php

namespace App;

use Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Yajra\Datatables\Datatables;

class contactus extends Model
{
    const apm_id ='9';

    public function storeContactus($request)
    {
    	if (isset(Auth::user()->id)) {
            $input=$request->all();
            $res=new contactus;
            $res->name=$input['name'];
            $res->email=$input['email'];
            $res->subject=$input['subject'];
            $res->message=$input['message'];
            $res->save();
             $errors="";
              $msg ="saved success.";
            return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
        }else{
            flashMessage('danger','You Have To Login First');
            return redirect()->back();

        }
    }

    public function datableContactus()
    {
    	 return Datatables::of(contactus::query())

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_contact').'" data-del_id='.Crypt::encrypt($data->id).' id="del_contact" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>';
                        })
                ->editColumn('id', function($data){
                            return  '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
             
                ->rawColumns(['status','handle','id'])
            
                ->make(true);
    }
    public function deleteContactUs($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_contact')) {    
           $id=$request->input('del_id');
           $del_id=Crypt::decrypt($id);
           
           contactus::destroy('id',$del_id);
        }else{
            return 'accessdenied';
        }
    }
    public function deleteAllContactUs($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_contact')) {     
            $ids=$request->input('del_id');
            $id=Crypt::decrypt($ids);
           foreach ($id as $key) {
             contactus::destroy($key);
           }
        }else{
            return 'accessdenied';
        }
    }
}
