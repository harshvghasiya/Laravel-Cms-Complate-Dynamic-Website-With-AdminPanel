@extends('admin.layout')
@if(isset($edit))

@section('title','Edit QNA')

@else

@section('title','Add QNA')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1>Edit QNA </h1>
        </div>

       @else

      <div class="page-title">
            <h1>Add QNA </h1>
        </div>

       @endif
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box red">
        <div class="portlet-title">
              @if(isset($edit))
            <div class="caption">
                <i class="fa fa-gift"></i> Edit QNA
            </div>
              @else
            <div class="caption">
                <i class="fa fa-gift"></i> Add QNA
            </div>
             @endif
            
            <div class="tools">
                <a href="" class="collapse">
                </a>
                <a href="#portlet-config" data-toggle="modal" class="config">
                </a>
                <a href="" class="reload">
                </a>
                <a href="" class="remove">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            @if(isset($edit))
           {{Form::model($edit, ['route' => ['upd_qna', $edit],
                                   'id' =>'qnaValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('qnaListMain')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
                 }}  
            @else
           
            {!! Form::open(['route' => 'qnastore',
                            'id' =>'qnaValidation',
                          'class'=>'FromSubmit ',
                          'redirect_url' =>route('qnaListMain')]) !!}
            @endif   
                <div class="form-body">
                  <h3 class="form-section">QNA Info</h3>
                  <div class="row">
              
                <div class="form-group col-md-6">
                    <label class="control-label">Question</label>
                {{ Form::text('question',old('Question') ,['id'=>'Question','class' => 'form-control','placeholder'=>'Question'])
                 }}      
                </div>

                 <div class="form-group col-md-12">
                    <label class="control-label"> Answer</label>
                {{ Form::textarea('answer',old('answer') ,['id'=>'answer','class' => 'form-control','placeholder'=>' Answer'])
                 }}      
                </div>
         
                <div class="form-group col-md-6">
                        <label>Status</label>
                        <div class="radio-list">
                            <label class="radio-inline">
                                {{ Form::radio('status', 'Active', true, ['id'=>'optionsRadios4'])}}
                              Active
                            <label class="radio-inline">

                                 {{ Form::radio('status', 'InActive',null ,['id'=>'optionsRadios5'])}}
                           InActive
                        </div>
                    </div>
                 </div>            
                <div class="form-actions">
                  <button type="submit" class="btn blue">Submit</button>
                    <a href="{{url('admin/qnalist')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection
@section('script')

  
   
   
@endsection