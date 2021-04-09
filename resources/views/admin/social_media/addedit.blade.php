@extends('admin.layout')
@if(isset($edit))

@section('title','Edit Social Media')

@else

@section('title','Add Social Media')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1> Social Media </h1>
        </div>

       @else

      <div class="page-title">
            <h1> Social Media </h1>
        </div>

       @endif
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
              @if(isset($edit))
            <div class="caption">
                <i class="fa fa-gift"></i> Edit Social Media
            </div>
              @else
            <div class="caption">
                <i class="fa fa-gift"></i> Add Social Media
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
           {{Form::model($edit, ['route' => ['upd_some', $edit],
                                   'id' =>'someValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('someListMain')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
                 }}  
            @else
           
            {!! Form::open(['route' => 'somestore',
                            'id' =>'someValidation',
                          'class'=>'FromSubmit',
                          'redirect_url' =>route('someListMain')]) !!}
            @endif   
                <div class="form-body">
                <div class="form-group">
                    <label class="control-label">Title</label>
                {{ Form::text('title',old('title') ,['class' => 'form-control'])
                 }}   
                 
                </div>
                  <div class="form-group">
                    <label class="control-label">URL</label>
                {{ Form::text('url',old('url') ,['class' => 'form-control'])
                 }}   
                 
                </div>                 
                <div class="form-group">
                  <label for="exampleInputFile1">Chose icon</label>
                  {{Form::file('icon',['class'=>'','onchange'=>"loadFile(event)"])}}
                </div>

                <p class="help-block">
                  <img id="output" @if(isset($edit))
                                   src="{{$edit->getSocialMediaImageUrl()}}"
                                   @else
                                   src="{{No_Image_Url()}}"
                                   @endif
                                    width="150px" ; height="150px" ; />
                </p>
                <script>
                  var loadFile = function(event) {
                  var output = document.getElementById('output');
                  output.src = URL.createObjectURL(event.target.files[0]);
                  console.log(output.src);
                  output.onload = function() {
                  URL.revokeObjectURL(output.src) // free memory
                  }
                  };
                </script>


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
                    <a href="{{url('admin/socialmedialist')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection