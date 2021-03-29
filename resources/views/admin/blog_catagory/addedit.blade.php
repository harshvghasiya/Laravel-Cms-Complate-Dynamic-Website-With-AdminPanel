@extends('admin.layout')
@if(isset($edit))

@section('title','Edit Catagory')

@else

@section('title','Add Catagory')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1>Edit Catagory </h1>
        </div>

       @else

      <div class="page-title">
            <h1>Add Catagory </h1>
        </div>

       @endif
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
              @if(isset($edit))
            <div class="caption">
                <i class="fa fa-gift"></i> Edit Catagory
            </div>
              @else
            <div class="caption">
                <i class="fa fa-gift"></i> Add Catagory
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
           {{Form::model($edit, ['route' => ['upd_catagory', $edit],
                                   'id' =>'catagoryValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('catagoryListMain')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
                 }}  
            @else
           
            {!! Form::open(['route' => 'catagorystore',
                            'id' =>'catagoryValidation',
                          'class'=>'FromSubmit',
                          'redirect_url' =>route('catagoryListMain')]) !!}
            @endif   
                <div class="form-body">
                <div class="form-group">
                    <label class="control-label">Catagory</label>
                {{ Form::text('catagory',old('catagory') ,['class' => 'form-control'])
                 }}   
                 
                </div>
                    

                    <div class="form-group">
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
                    <a href="{{url('/admin/catagorylist')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection