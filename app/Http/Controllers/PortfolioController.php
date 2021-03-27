<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\portfolio;
use Illuminate\Http\Request;


class PortfolioController extends Controller
{
    function __construct()
    { 
        $this->Model=new portfolio;
        $apm_id=portfolio::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
  
    public function create()
    {
      return $this->Model->createPortfolio();
    }

    public function store_upd(PortfolioRequest $request)
    {
      return $this->Model->savePortfolio($request);
    }
    public function port_datable()
    {   
      return $this->Model->datablePortfolio();
    }

    public function show(portfolio $portfolio)
    {
      return view('admin.portfolio.portfoliolist');
    }

    public function edit(portfolio $portfolio,$id)
    {  
      return $this->Model->editPortfolio($id);
    }
    
   public function del_all(Request $request)
   {
     return $this->Model->deleteAllPortfolio($request);
   }

   public function status_all(Request $request)
   {
      return $this->Model->statusAllPortfolio($request);
   }

    public function status(portfolio $portfolio,Request $request)
    {
      return $this->Model->statusPortfolio($request);   
    }
  
    public function destroy(portfolio $portfolio,Request $request)
    {
       return $this->Model->deletePortfolio($request);
    }
}
