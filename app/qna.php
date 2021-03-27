<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Yajra\Datatables\Datatables;

class qna extends Model
{
    const apm_id ='29';
    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    public function createQna()
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_qna')) {    
         return view('admin.qna.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('qnaListMain');
        }
    }

    public function saveQna($request)
    {
    	 $id=$request->input('id');
         if ($id != null) {
             $res= qna::find($id);
         }else{
           $res=new qna;
         }
        $res->question=$request->input('question');
        $res->answer=$request->input('answer');
        $res->status=$request->input('status');
        $res->save();
        
        $errors="";
        $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
    }

    public function datableQna()
    {
    	$sql=qna::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_qna').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_qna').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){

                            return '<a class="btn btn-danger del_data" data-route="'.route('del_qna').'" id="del_qna" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_qna',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
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

    public function editQna($id)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'edit_qna')) {    
    		$ids=Crypt::decrypt($id);
    		$edit=qna::find($ids);
    		return view('admin.qna.addedit',compact('edit'));
    	}else{
    		flashMessage('danger','Access Denied');
    		return redirect()->route('qnaListMain');
    	}
    }

    public function deleteAllQna($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_qna')) {    
    		$id=$request->input('del_id');
    		foreach ($id as $key) {
    			qna::destroy($key);
    		}
    	}else{
    		return 'accessdenied';
    	}
    }

    public function statusQna($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_qna')) {     
          $id=$request->input('status_id');
          $res=qna::find($id);
          if ($res->status=='InActive') {
              $res->status='Active';
              $res->save();

          }else{
            $res->status='InActive';
            $res->save();
          }
        }else{
            return 'accessdenied';
        }
    }

    public function statusAllQna($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_qna')) {     
    		$id=$request->input('status_id');
    		foreach ($id as $key) {
    			$res=qna::find($key);
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

    public function deleteQna($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_qna')) {     
    		$del_id=$request->input('del_id');
    		$id=Crypt::decrypt($del_id);
    		qna::destroy($id);
    	}else{
    		return 'accessdenied';
    	}
    }
   
}
