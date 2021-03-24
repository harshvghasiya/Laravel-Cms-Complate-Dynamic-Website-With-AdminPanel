<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;

class PortfolioController extends Controller
{
    function __construct()
    { 
        $apm_id=portfolio::apm_id;
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
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_port')) {    
        return view('admin.portfolio.addedit');
      }else{
        flashMessage('danger','Access Denied');
        return redirect()->route('portListMain');
      }
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_upd(PortfolioRequest $request)
    {
      $id=$request->input('id');
      if ($id != null) {
        $res=portfolio::find($id);
      }else{
        $res=new portfolio;
      }
      
      $image=$request->file('image');
      if ($image != null) {
       $exe=$image->extension();
      $image_name=time().'.'.$exe;
      $image->storeAs('/public/portfolioimage',$image_name);
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
    public function port_datable()
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
                           if ($data->image == 'noimage.png') {
                         return '<img src="'.asset("/public/storage/blogimage/$data->image").'" width="80px";
                                        height="60px";>';
                           }
                            return '<img src="'.asset("/public/storage/portfolioimage/$data->image").'" width="80px";
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


    /**
     * Display the specified resource.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        return view('admin.portfolio.portfoliolist');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio,$id)
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

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    // public function update(PortfolioRequest $request, portfolio $portfolio)
    // {
    //     $id=$request->input('id');
    //     $res=portfolio::find($id);
    //   $image=$request->file('image');
    //   if ($image != null) {
      
    //   $exe=$image->extension();
    //   $image_name=time().'.'.$exe;
    //   $image->storeAs('/public/portfolioimage',$image_name);
    //   $res->image=$image_name;
    //   }
       
      
    //   $res->name=$request->input('name');
    //   $res->status=$request->input('status');
    //   $res->url=$request->input('url');

    //   $res->save();

    //   $errors="";
    //   $msg ="saved success.";
    //   return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);

    // }
    
   public function del_all(Request $request)
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

   public function status_all(Request $request)
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

    public function status(portfolio $portfolio,Request $request)
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
   
    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(portfolio $portfolio,Request $request)
    {
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_port')) {    
        $ids=$request->input('del_id');
        $id=Crypt::decrypt($ids);
        portfolio::destroy($id);
      }else{
        return 'accessdenied';
      }
    }
}
