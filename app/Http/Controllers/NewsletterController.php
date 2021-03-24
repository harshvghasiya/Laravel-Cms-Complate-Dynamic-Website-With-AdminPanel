<?php

namespace App\Http\Controllers;

use App\Http\Requests\newsRequest;
use App\newsletter;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;


class NewsletterController extends Controller
{
      function __construct()
    { 
        $apm_id=newsletter::apm_id;
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
    public function store(newsRequest $request)
    {
       $res=new newsletter;
       $res->email=$request->input('email');
       $res->status='Active';
       $res->save();
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(newsletter $newsletter)
    {
        return view('admin.newsletter.newsletterlist');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(newsletter $newsletter)
    {
        //
    }

     public function news_datable()
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
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_news').'" id="del_news" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_module',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                ->editColumn('id', function($data){
                            return  '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                
                ->rawColumns(['status','handle','id'])
            
                ->make(true);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, newsletter $newsletter)
    {
        //
    }

    public function status(Request $request)
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

       public function status_all(Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_news')) {    
                $status_id=$request->input('status_id');
                // dd($status_id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(newsletter $newsletter,Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'destroy_news')) {    
            $del_id=$request->input('del_id');
            $id=Crypt::decrypt($del_id);
            newsletter::destroy($id);
        }else{
           return 'accessdenied';
        }
    } 
      public function del_all(newsletter $newsletter,Request $request)
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
