<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Yajra\Datatables\Datatables;

class portfolio extends Model
{
    const apm_id ='12';
    
    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    public function createPortfolio()
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_port')) {    
        return view('admin.portfolio.addedit');
      }else{
        flashMessage('danger','Access Denied');
        return redirect()->route('portListMain');
      }
    }

    public function savePortfolio($request)
    {
    	$id=$request->input('id');
      if ($id != null) {
        $res=portfolio::find($id);
      }else{
        $res=new portfolio;
        $res->created_by=Auth::guard('adminlogin')->user()->id;
      }
      
      $image=$request->file('image');
      if ($image != null) {
      $image_name=UploadImage($image,Portfolio_Image_Path());
      $res->image=$image_name;
      }

      $res->name=$request->input('name');
      $res->url=$request->input('url');
      $res->status=$request->input('status');
      
      $res->save();

      $errors="";
      $msg ="saved success.";
      flashMessage('success',$msg);
      return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
    }

    public function datablePortfolio()
    {
    	  $sql=portfolio::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status', function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_port').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_port').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_port').'" id="del_port" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_port',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('image', function($data){
                            return '<img src="'.$data->getPortfolioImageUrl().'" width="80px";
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

    public function editPortfolio($id)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'edit_port')) {    
    		$ids=Crypt::decrypt($id);
    		$edit=portfolio::find($ids);
    		return view('admin.portfolio.addedit',compact('edit'));
    	}else{
    		flashMessage('danger','Access Denied');
    		return redirect()->route('portListMain');
    	}
    }

    public function deleteAllPortfolio($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_port')) {    
    		$id=$request->input('del_id');
    		foreach ($id as $key) {
    			portfolio::destroy($key);
    		}
    	}else{
    		return 'accessdenied';
    	}
    }

    public function statusAllPortfolio($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_port')) {      
    		$id=$request->input('status_id');

    		foreach ($id as $key) {
    			$res=portfolio::find($key);
    			if ($res->status == 'Active') {
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

    public function statusPortfolio($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_port')) {    
    		$ids=$request->input('status_id');
    		$res=portfolio::find($ids);
    		if ($res->status == 'InActive') {
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
    
    public function deletePortfolio($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_port')) {    
    		$ids=$request->input('del_id');
    		$id=Crypt::decrypt($ids);
    		portfolio::destroy($id);
    	}else{
    		return 'accessdenied';
    	}
    }

    public function getPortfolioImageUrl()
    {
      $imgname=$this->image;

      $imagePath=Portfolio_Image_Exist().'/'.$imgname;
      $imageUrl=Portfolio_Image_Url().'/'.$imgname;

      if (file_exists($imagePath)) {
        return $imageUrl;
      }else{
        return No_Image_Url();
      }    
    }
   
    
}
