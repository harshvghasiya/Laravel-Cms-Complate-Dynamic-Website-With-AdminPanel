<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterValidationRequest;
use App\newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
      function __construct()
    { 
        $this->Model=new newsletter;
        $apm_id=newsletter::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
    
   
    public function store(NewsletterValidationRequest $request)
    {
      return $this->Model->storeNewsletter($request);
    }

    public function show(newsletter $newsletter)
    {
        return view('admin.newsletter.newsletterlist');
    }

     public function news_datable()
    {
       return $this->Model->datableNewsLetter();
    }
  
    public function status(Request $request)
    {
       return $this->Model->statusNewsLetter($request);
    }

    public function status_all(Request $request)
    {
        return $this->Model->statusAllNewsLetter($request);
    }

    public function destroy(newsletter $newsletter,Request $request)
    {
        return $this->Model->deleteNewsLetter($request);
    } 

    public function del_all(newsletter $newsletter,Request $request)
    {
        return $this->Model->deleteAllNewsLetter($request);
    }
}
