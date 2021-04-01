<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypt;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;


class newsletter extends Model
{
    const apm_id ='11';

    public function storeNewsletter($request)
    {
       $res=new newsletter;
       $res->email=$request->input('email');
       $res->status='Active';
       $res->save();
       flashMessage('success','Your Msg Saved');
       return back();
    }

    public function datableNewsLetter()
    {
    	 return Datatables::of(newsletter::query())
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_news').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_news').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_news').'" id="del_news" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>';
                        })
                ->editColumn('id', function($data){
                            return  '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                
                ->rawColumns(['status','handle','id'])
            
                ->make(true);
    }

    public function statusNewsLetter($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_news')) {    
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=newsletter::find($status_id);
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

    public function statusAllNewsLetter($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_news')) {    
                $status_id=$request->input('status_id');
                foreach ($status_id as $value) {
          
                $res=newsletter::find($value);
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

    public function deleteNewsLetter($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'destroy_news')) {    
            $del_id=$request->input('del_id');
            $id=Crypt::decrypt($del_id);
            newsletter::destroy($id);
        }else{
           return 'accessdenied';
        }
    }

    public function deleteAllNewsLetter($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_cms')) {    
            $del_id=$request->input('del_id');
            foreach ($del_id as $key) {
                newsletter::destroy($key);
            }
        }else{
            return 'accessdenied';
        }
    }
}
