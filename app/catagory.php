<?php

namespace App;
use App\blog_catagory;
use Illuminate\Database\Eloquent\Model;
use Crypt;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class catagory extends Model
{

    const apm_id ='6';

    
      public function blog_catagory()
    {
    	return $this->hasmany(blog_catagory::class,'catagory_id','id');
    }

    public static function CatagoryCount($id)
    {
    	$sql=blog_catagory::where('catagory_id',$id)->count();
    	return $sql;
    }

     
      public static function getPostCatagory($id)
      {

        $blogCategory=blog_catagory::with(['catagory'])->where('blogs_id',$id)->get();
        foreach ($blogCategory as $key => $value) {
            $y[]= $value->catagory->catagory;
        }
        return $y;
    }

    public function created_email()
    {
        return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    // Create Category

    public function createCatagory()
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_catagory')) {  
          return view('admin.blog_catagory.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('catagoryListMain');
        }
    }

    // Store Category
    public function storeCatagory($request)
    {
        $res=new catagory;
        $res->catagory=$request->input('catagory');
        $res->created_by=Auth::guard('adminlogin')->user()->id;
        $res->status=$request->input('status');
        $res->save();
         $errors="";
          $msg ="saved success.";
          flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    // Catagory Data Table

    public function catagoryDatable()
    {
        $sql=catagory::with(['blog_catagory','created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_catagory').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_catagory').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 
                ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        })

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_catagory').'" id="del_catagory" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_catagory',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                  ->editColumn('id', function($data){
                           $x=$data->blog_catagory;           
                           if ($x != null) {                  
                           foreach ($x as $key => $value) {
                               $y=$value->catagory_id; 

                                 if($y){
                                    return '';
                                 }
                           }
                         }
                            return '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })             
                ->rawColumns(['status','handle','id','created_by'])
                ->make(true);
    }

    public function editCategory($id)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'edit_catagory')) {   
                $ids=Crypt::decrypt($id);
                $edit=catagory::find($ids);
                return view('admin.blog_catagory.addedit',compact('edit'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('catagoryListMain');
        }
    }

    // Update Category
    public function updateCatagory($request)
    {
        $id=$request->input('id');
        $res=catagory::find($id);
        $res->catagory=$request->input('catagory');
        $res->status=$request->input('status');
        $res->save();
          $errors="";
          $msg ="saved success.";
          flashMessage('success',$msg);

        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    // Status Category
    public function statusCatagory($request)
    {
         if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_catagory')) {  
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=catagory::find($status_id);
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

    // Status All Category
    public function statusAllCatagory($request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_catagory')) {    
                $status_id=$request->input('status_id');
                foreach ($status_id as $value) {
                    $res=catagory::find($value);
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

    // Delete Category

    public function deleteCatagory($request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_catagory')) {    

                $id=$request->input('del_id');
                $del_id=Crypt::decrypt($id);
                
                $sql=blog_catagory::where('catagory_id',$del_id)->first();
                if ($sql != null) {
                    return 'no';
                }else{
                 catagory::destroy($del_id);
                }
        }else{
            return 'accessdenied';
        }
    }

    // Delete All Category
    public function deleteAllCatagory($request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'dell_all_catagory')) {    

                $id=$request->input('del_id');
                foreach ($id as $key) {
                    $sql=blog_catagory::where('catagory_id',$key)->first();
                    if ($sql != null) {
                        return 'no';
                    }else{
                       catagory::destroy($key);
                   }
               }
        }else{
            return 'accessdenied';
        }
    }

     
}
