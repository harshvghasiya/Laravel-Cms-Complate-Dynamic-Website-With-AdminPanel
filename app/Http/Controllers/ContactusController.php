<?php

namespace App\Http\Controllers;

use App\contactus;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;


class ContactusController extends Controller
{
      function __construct()
    { 
        $apm_id=contactus::apm_id;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function show(contactus $contactus)
    {

        return view('admin.contactus.contactus');
    }


     public function contact_datable()
    {
          
          return Datatables::of(contactus::query())

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger" id="del_contact" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>';
                        })
                ->editColumn('id', function($data){
                            return  '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                 
                
                ->rawColumns(['status','handle','id'])
            
                ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function edit(contactus $contactus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactus $contactus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contactus  $contactus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_contact')) {    
           $id=$request->input('del_id');
           $del_id=Crypt::decrypt($id);
           
           contactus::destroy('id',$del_id);
        }else{
            return 'accessdenied';
        }
    }

   public function del_all(contactus $contactus,Request $request)
    {
     if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_contact')) {     
            $id=$request->input('del_id');
           foreach ($id as $key) {
             contactus::destroy($key);
           }
        }else{
            return 'accessdenied';
        }
    }
}
