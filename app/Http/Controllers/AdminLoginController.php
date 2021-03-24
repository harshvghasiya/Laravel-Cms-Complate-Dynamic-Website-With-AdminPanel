<?php

namespace App\Http\Controllers;

use App\Accessuser;
use App\AdminLogin;
use App\Apdeledit;
use App\Apm_user;
use App\Http\Requests\AdminUpdRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;


class AdminLoginController extends Controller
{

    function __construct()
    { 
        $apm_id=AdminLogin::apm_id;
        $this->middleware('access:'.$apm_id.'', ['only' => ['show','user_datable','store','status','destroy','status_all']]); 
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
    // public function acpri(Request $request)
    // {
    //     $id=$request->input('id');
    //     $account_private=$request->input('acount_privacy');
    //     // dd($account_private);
    //     $res=AdminLogin::find($id);
    //     if ($account_private==0 || $account_private == 1) {
    //     $res->acount_privacy=$account_private;
    //     $res->save();
    //     }
    //     $errors="";
    //     $msg ="saved success.";
    //     return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
       

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

      public function show(AdminLogin $adminLogin)
    {
        return view('admin.login.userlist');
    }

      public function viewuser(AdminLogin $adminLogin,$viewuser)
    {
        $viewemail=Crypt::decrypt($viewuser);
        $id=AdminLogin::where('email',$viewemail)->get();
       
        $userprofile=AdminLogin::find($id);
        foreach ($userprofile as $key) {
         return view('admin.login.userprofile',compact('key'));
        }
        
       
    }

      public function user_datable()
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


    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {

         // dd(array_merge($request->input('apm_list'), $request->input('get_access')));
        $res=new AdminLogin;
        $image=$request->file('image');
        if ($image != null) {
         $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/userimage',$image_name);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function showlogin(AdminLogin $adminLogin)
    {
        return view('admin.login.login');
    } 

    public function showregister(AdminLogin $adminLogin)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_user')){
         return view('admin.login.register');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('userListMain') ;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminLogin $adminLogin,$id)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_user')){
            $ids=Crypt::decrypt($id);
            $edit=AdminLogin::find($ids);
            // dd($edit);
            $apm_check=apm_user::where('user_id',$ids)->pluck('apm_id')->toArray();

            return view('admin.login.register',compact('edit','apm_check'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('userListMain');

        }
    }  


      public function change_password(AdminLogin $adminLogin,ChangePasswordRequest $request)
    {
        $input=$request->all();
        echo $input;

    }

      public function login(AdminLogin $adminLogin,LoginRequest $request)
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
     public function logout()
    {
        // dd('hfgh');
       Auth::guard('adminlogin')->logout();
       flashMessage('success','Logout Successfully ');
       return redirect()->route('loginform');
    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdRequest $request, AdminLogin $adminLogin)
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
    public function update_image(Request $request)
    {

        $id=$request->input('id');

        $image=$request->file('image');
        $res=AdminLogin::find($id);
       
        if($image != null) {
           $exe=$image->extension();
           $image_name=time().'.'.$exe;
           $image->storeAs('/public/userimage',$image_name);
        }else{
            $image_name='noimage.png';
        }
        $res->image=$image_name;
        $res->save();
        

        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }
    public function del_all(Request $request, AdminLogin $adminLogin)
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
    public function status(Request $request)
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

    public function status_all(Request $request)
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

    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\AdminLogin  $adminLogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminLogin $adminLogin,Request $request)
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


    public function register_upd(Request $request)
    {

       $image=$request->file('image');
       $id=$request->input('id');
       $res=AdminLogin::find($id);
       $res->name=$request->input('name');
       $res->email=$request->input('email');
       $res->status=$request->input('status');
       // $res->password=Hash::make($request->input('password'));
   
       if($image != null) {
           $exe=$image->extension();
           $image_name=time().'.'.$exe;
           $image->storeAs('/public/userimage',$image_name);
            $res->image=$image_name;
        }
       
        $res->save();

       $catagory=$request->input('apm_list');
       if ($catagory != null) {
            // dd($catagory);

          foreach ($catagory as $key) {
            $ids=apm_user::where('user_id',$id)->where('apm_id',$key)->first();
            $del=apm_user::where('user_id',$id)->pluck('id')->toArray();


            // dd($ids);
            if ($ids != null){


              if (in_array($ids->id,$del)) {
                    foreach ($del as $k) {


                      if ($k != $ids->id) {

                        apm_user::destroy($k);
                      
                        }
                    }
                      // return redirect('/product');
                }
            }else{
                $resu=new apm_user;
                $resu->user_id=$id;
                $resu->apm_id=$key;
                $resu->save();
                // dd('jhg');
     
             }  
        }
      

     }

        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }


}
