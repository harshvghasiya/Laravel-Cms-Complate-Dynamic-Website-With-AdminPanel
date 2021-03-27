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
use Illuminate\Http\Request;


class AdminLoginController extends Controller
{

    function __construct()
    { 
        $this->Model=new adminLogin;
        $apm_id=AdminLogin::apm_id;
        $this->middleware('access:'.$apm_id.'', ['only' => ['show','user_datable','store','status','destroy','status_all']]); 
    }
     
    public function show(AdminLogin $adminLogin)
    {
        return view('admin.login.userlist');
    }

      public function viewuser(AdminLogin $adminLogin,$viewuser)
    {
       return $this->Model->viewAdminProfile($viewuser);
    }

      public function user_datable()
    {     
        return $this->Model->datableAdmin();
    }

    public function store(RegisterRequest $request)
    {
        return $this->Model->saveAdmin($request);
    }

    public function showlogin(AdminLogin $adminLogin)
    {
        return view('admin.login.login');
    } 

    public function showregister(AdminLogin $adminLogin)
    {
        return $this->Model->registerAdmin();
    }

    public function edit(AdminLogin $adminLogin,$id)
    {
        return $this->Model->editAdmin($id);
    }  

    public function login(AdminLogin $adminLogin,LoginRequest $request)
    {
        return $this->Model->loginAdmin($request);
    }

    public function logout()
    {
       return $this->Model->logoutAdmin();
    }

    public function update(AdminUpdRequest $request, AdminLogin $adminLogin)
    {
       return $this->Model->updateAdminProfile($request);
    }

    public function update_image(Request $request)
    {
        return $this->Model->updateAdminProfileImage($request);
    }
    public function del_all(Request $request, AdminLogin $adminLogin)
    {
       return $this->Model->deleteAllAdmin($request);
    }
    public function status(Request $request)
    {
       return $this->Model->statusAdmin($request);
    }

    public function status_all(Request $request)
    {
       return $this->Model->statusAllAdmin($request);
    }

    public function destroy(AdminLogin $adminLogin,Request $request)
    {
       return $this->Model->deleteAdmin($request);
    }

    public function register_upd(Request $request)
    {
        return $this->Model->updateAdmin($request);
    }


}
