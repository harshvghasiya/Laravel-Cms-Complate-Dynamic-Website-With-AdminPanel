@extends('admin.layout')
@if(isset($edit))

@section('title','Edit testimonial')

@else

@section('title','Add testimonial')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1>Edit Testimonial </h1>
        </div>

       @else

      <div class="page-title">
            <h1>Add Testimonial </h1>
        </div>

       @endif
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box red">
        <div class="portlet-title">
              @if(isset($edit))
            <div class="caption">
                <i class="fa fa-gift"></i> Edit Testimonial
            </div>
              @else
            <div class="caption">
                <i class="fa fa-gift"></i> Add testimonial
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
           {{Form::model($edit, ['route' => ['upd_testimonial', $edit],
                                   'id' =>'testimonialValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('testimonialListMain')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
                 }}  
            @else
           
            {!! Form::open(['route' => 'testimonialstore',
                            'id' =>'testimonialValidation',
                          'class'=>'FromSubmit ',
                          'redirect_url' =>route('testimonialListMain')]) !!}
            @endif   
                <div class="form-body">
                  <h3 class="form-section">Testimonial Info</h3>
                  <div class="row">
              
                <div class="form-group col-md-6">
                    <label class="control-label">Name</label>
                {{ Form::text('name',old('name') ,['id'=>'name','class' => 'form-control','placeholder'=>'Name'])
                 }}      
                </div>

                 <div class="form-group col-md-6">
                    <label class="control-label"> Role</label>
                {{ Form::text('role',old('Role') ,['id'=>'Role','class' => 'form-control','placeholder'=>' Role'])
                 }}      
                </div>
               <div class="form-group col-md-6">
                  <label class="control-label"> About</label>
                {{ Form::textarea('about',old('About') ,['id'=>'About','class' => 'form-control','placeholder'=>' About'])
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

                   <h3 class="form-section">Upload Image</h3>
                                         
                       <div class="form-group">
                            <label for="exampleInputFile1">Cover Image</label>
                            {{Form::file('image',['class'=>'','onchange'=>"loadFile(event)"])}}
                       </div>
                        <p class="help-block">
                            <img id="output"  @if(isset($edit)) 
                                              src="{{$edit->getTestimonialImageUrl()}}"
                                              @else
                                              src="{{No_Image_Url()}}"
                                              @endif
                                               width="150px"; height="150px"; />
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
                <div class="form-actions">
                  <button type="submit" class="btn blue">Submit</button>
                    <a href="{{route('testimonialListMain')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection
@section('script')

  
   
   
@endsection