<?php

namespace App\Http\Controllers;

use App\contactus;
use Illuminate\Http\Request;
use App\Http\Requests\ContactUsValidationRequest;


class ContactusController extends Controller
{
      function __construct()
    { 
        $this->Model=new contactus;
        $apm_id=contactus::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
   
    public function store(ContactUsValidationRequest $request)
    {
       return $this->Model->storeContactus($request);
    }

    public function show(contactus $contactus)
    {

        return view('admin.contactus.contactus');
    }

     public function contact_datable()
    {
        return $this->Model->datableContactus();
    }

    public function destroy(Request $request)
    {
       return $this->Model->deleteContactUs($request);
    }

   public function del_all(contactus $contactus,Request $request)
    {
      return $this->Model->deleteAllContactUs($request);
    }
}
