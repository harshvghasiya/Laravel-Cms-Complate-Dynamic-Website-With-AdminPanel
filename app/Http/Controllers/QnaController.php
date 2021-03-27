<?php

namespace App\Http\Controllers;

use App\Http\Requests\QnaRequest;
use App\qna;
use Illuminate\Http\Request;


class QnaController extends Controller
{
      function __construct()
    { 
        $this->Model=new qna;
        $apm_id=qna::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
    
    public function create()
    {
       return $this->Model->createQna();
    }

    public function store_upd(QnaRequest $request)
    {
       return $this->Model->saveQna($request);
    }

    public function qna_datable()
    {
       return $this->Model->datableQna();
    }

    public function show(qna $qna)
    {
        return view('admin.qna.qnalist');

    }

    public function edit(qna $qna,$id)
    {
       return $this->Model->editQna($id);
    }

    public function del_all(qna $qna,Request $request)
    {
      return $this->Model->deleteAllQna($request);
    }

    public function status(qna $qna,Request $request)
    {
      return $this->Model->statusQna($request);
    }

    public function status_all(qna $qna,Request $request)
    {
        return $this->Model->statusAllQna($request);
    }

    public function destroy(qna $qna,Request $request)
    {  
       return $this->Model->deleteQna($request);
    }
}
