<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagValidationRequest;
use App\Tag;
use App\blog_tag;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class TagController extends Controller
{
        function __construct()
    { 
        $apm_id=blog_tag::apm_id;
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
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_tag')) {  
           return view('admin.blog_tag.edit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('catagoryListMain');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagValidationRequest $request)
    {
        $res=new Tag;
        $res->tag=$request->input('tag');
        $res->status=$request->input('status');
        $res->save();

        $errors='';
         $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
         return view('admin.blog_tag.taglist');
    }


    public function tag_datable()
    {
          
          $sql=Tag::with(['created_email']);
          // dd($sql);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_tag').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_tag').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_tag').'" id="del_tag" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_tag',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        })
                 ->editColumn('id', function($data){
                            return '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                 
               
                
                ->rawColumns(['status','handle','id','created_by'])
            
                ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag,$id)
    {
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_tag')){
        $ids=Crypt::decrypt($id);
        $edit=Tag::find($ids);
        return view('admin.blog_tag.edit',compact('edit'));
        }else{
        flashMessage('danger','Access Denied');
            return redirect()->route('catagoryListMain');
        }
    }

     public function status_tag(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_tag')) {   
                $status=$request->input('status');
                $status_id=$request->input('status_id');
                $res=Tag::find($status_id);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagValidationRequest $request, Tag $tag)
    {
         $id=$request->input('id');
        $res=Tag::find($id);
        $res->tag=$request->input('tag');
        $res->status=$request->input('status');
        $res->save();
        $errors="";
        $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
    {
         if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_tag')) {  
           $id=$request->input('del_id');
           $del_id=Crypt::decrypt($id);
           Tag::destroy($del_id);
        }else{
            return 'accessdenied';
        }
    }

    public function del_all(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_tag')) {    

                $id=$request->input('del_id');
                foreach ($id as $key) {
                    $sql=blog_tag::where('tag_id',$key)->first();
                    if ($sql != null) {
                        return 'no';
                    }else{
                       Tag::destroy($key);
                   }
               }
        }else{
            return 'accessdenied';
        }
    }


    public function status_all(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_tag')) {    
                $status_id=$request->input('status_id');
                // dd($status_id);
                foreach ($status_id as $value) {

                    $res=Tag::find($value);
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
}
