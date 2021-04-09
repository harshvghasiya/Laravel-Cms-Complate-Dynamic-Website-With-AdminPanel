<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;


class AdminLogin extends Authenticatable
{
    use Notifiable;
    
    const apm_id ='17';

     protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember',
    ];


     public function banner_create()
    {
    	return $this->hasmany(banner::class,'created_by','id');
    } 

    public function user_apm_right()
    {
        return $this->hasMany(\App\Apm_user::class,'user_id','id'); 
    }

     public function auth_rel()
    {
        return $this->hasmany(userfollow::class,'auth_id','id');
    }

        public function user_rel()
    {
        return $this->hasmany(userfollow::class,'user_id','id');
    }

     public static function getCreateBy($id)
    {
      $x=AdminLogin::find($id);
       if ($x != null) {
        return $x->email;
       }
    }

    public function viewAdminProfile($viewuser)
    {
        $viewemail=Crypt::decrypt($viewuser);
        $id=AdminLogin::where('email',$viewemail)->get();
       
        $userprofile=AdminLogin::find($id);
        foreach ($userprofile as $key) {
         return view('admin.login.userprofile',compact('key'));
        }     
       
    }

    public function datableAdmin()
    {
      return Datatables::of(AdminLogin::query())
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_user').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_user').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_user').'" id="del_user" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_user',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
               
                 ->editColumn('id', function($data){
                            return '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })          
                
                ->rawColumns(['status','handle','id'])
            
                ->make(true);
    }

    public function saveAdmin($request)
    {   

        $res=new AdminLogin;
        $image=$request->file('image');
        if ($image != null) {
        $image_name=UploadImage($image,Admin_Image_Path());
        $res->image=$image_name;
        }
       
        $res->email=$request->input('email');
        $res->name=$request->input('name');
        $res->password=Hash::make($request->input('password'));
        $res->status=$request->input('status');
       
        $res->save();


        if ($request->input('apm_list') != null) {
            $apm_list=$request->input('apm_list');
            foreach ($apm_list as $key) {
                $result=new Apm_user;
                $result->apm_id=$key;
                $result->user_id=$res->id;
                $result->save();

                if ($request->input('get_access') != null  ) {
                    $del_edit_access=$request->input('get_access');
                    foreach ($del_edit_access as $k) {
                       $check_slug=Apdeledit::where('module_id',$key)->where('slug',$k)->first();
                      if ($check_slug != null) {                     
                          $r=new Accessuser;
                          $r->module_id=$key;
                          $r->user_id=$res->id;
                          $r->access_slug=$k;
                          $r->save();
                        }
                    }
                }
            }
        }
   
        $errors="";
        $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    public function registerAdmin()
    {
      if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_user')){
         return view('admin.login.register');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('userListMain') ;
        }
    }

    public function editAdmin($id)
    {
      if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_user')){
            $ids=Crypt::decrypt($id);
            $edit=AdminLogin::find($ids);
          
            $apm_check=apm_user::where('user_id',$ids)->pluck('apm_id')->toArray();

            return view('admin.login.register',compact('edit','apm_check'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('userListMain');

        }
    }

    public function loginAdmin($request)
    {
        if (Auth::guard('adminlogin')->attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
     
         if ($request->has('remember')) {
             Cookie::make('email', $request->email,60);
         }
        $errors="";
        $msg ="Login Successfully.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
        }
        $errors="Cant Login";
        $msg ="Enter Valid Password Or Email.";
      
        flashMessage('danger',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
         
    }

    public function logoutAdmin()
    {
      Auth::guard('adminlogin')->logout();
       flashMessage('success','Logout Successfully ');
       return redirect()->route('loginform');
    }

    public function updateAdminProfile($request)
    {
       $id=$request->input('id');
        
        $res=AdminLogin::find($id);
        $res->name=$request->input('name');
        $res->email=$request->input('email');
        $res->save();

        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    public function updateAdminProfileImage($request)
    {
       $id=$request->input('id');

        
        $res=AdminLogin::find($id);

        $image=$request->file('image');
        if ($image != null) {
        $image_name=UploadImage($image,Admin_Image_Path());
        $res->image=$image_name;
        }
        $res->image=$image_name;
        $res->save();
        

        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    public function deleteAllAdmin($request)
    {
       if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_user')){
            $id=$request->input('del_id');
            $current_user_id=Auth::guard('adminlogin')->user()->id;
            if ($id !=null ) {

                foreach ($id as $key) {
                    if ($key != $current_user_id) {
                       AdminLogin::destroy($key); 
                    }else{
                      return 'no';
                    }
                }
            }
        }else{
          return 'accessdenied';
        }
    }

    public function statusAdmin($request)
    {
       if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_user')){
            $id=$request->input('status_id');
            $res=AdminLogin::find($id);
            if ($res->status =='Active') {
                $res->status='InActive';    
                $res->save();
            }else{
                $res->status="Active";
                $res->save();
            }
        }else{
            return 'accessdenied';
        }
    }

    public function statusAllAdmin($request)
    {
       if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_user')){
            $status_id=$request->input('status_id');
            foreach ($status_id as $key) {
                
                $res=AdminLogin::find($key);
                if ($res->status == 'Active') {
                    $res->status='InActive';
                    $res->save();
                }else{
                    $res->status='Active';
                    $res->Save();
                }
            }
        }else{
            return 'accessdenied';
        }
    }

    public function deleteAdmin($request)
    {
       if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_user')){
            $ids=$request->input('del_id');
            $id=Crypt::decrypt($ids);
            $current_user_id=Auth::guard('adminlogin')->user()->id;
            if ($id == $current_user_id) {

                return 'yourself';
            }else{
                AdminLogin::destroy($id);
            }
        }else{

            return 'accessdenied';
        }

    }

    public function updateAdmin($request)
    {
       
       $id=$request->input('id');
       $res=AdminLogin::find($id);
       $res->name=$request->input('name');
       $res->email=$request->input('email');
       $res->status=$request->input('status');
       
   
        $image=$request->file('image');
        if ($image != null) {
        $image_name=UploadImage($image,Admin_Image_Path());
        $res->image=$image_name;
        }

        $res->save();
       Apm_user::where('user_id',$res->id)->delete();
       $apm_list=$request->input('apm_list');

       if (!empty($apm_list)) {
         foreach ($apm_list as $key => $value) {
            $resu=new apm_user;
            $resu->user_id=$res->id;
            $resu->apm_id=$value;
            $resu->save(); 
         }
       }
    
        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    public function getAdminImageUrl()
    {
        $imgname=$this->image;
        $imagePath=Admin_Login_Image_Check_Exist_Path().'/'.$imgname;
        $imageUrl=Admin_Login_Image_Url().'/'.$imgname;
        if (file_exists($imagePath)) {
           return $imageUrl;

       }else{
           return No_Image_Url();
       }
    }
}
