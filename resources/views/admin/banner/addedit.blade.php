@extends('admin.layout')
@if(isset($edit))

@section('title','Edit Banner')

@else

@section('title','Add Banner')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1>Edit Banner </h1>
        </div>

       @else

      <div class="page-title">
            <h1>Add Banner </h1>
        </div>

       @endif        
    </div>
    
    <div class="portlet box red">
        <div class="portlet-title">
            @if(isset($edit))
              <div class="caption">
                  <i class="fa fa-gift"></i> Edit Banner
              </div>
            @else
              <div class="caption">
                  <i class="fa fa-gift"></i> Add Banner
              </div>
            @endif
            
            <div class="tools">
                <a href="" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            @if(isset($edit))
           {{Form::model($edit, ['route' => ['upd_banner', $edit],
                                   'id' =>'bannerValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('bannerListMain')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
                 }}  
            @else
           
            {!! Form::open(['route' => 'bannerstore',
                            'id' =>'bannerValidation',
                          'class'=>'FromSubmit ',
                          'redirect_url' =>route('bannerListMain')]) !!}
            @endif   
                <div class="form-body">
                  <h3 class="form-section">Banner Info</h3>
                  <div class="row">
              
                <div class="form-group col-md-6">
                    <label class="control-label">Name</label>
                {{ Form::text('name',old('name') ,['id'=>'name','class' => 'form-control','placeholder'=>'Name'])
                 }}      
                </div>

                 <div class="form-group col-md-6">
                    <label class="control-label"> URL</label>
                {{ Form::text('url',old('url') ,['id'=>'url','class' => 'form-control','placeholder'=>' URl'])
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
                            <img id="output" @if(isset($edit))
                                             src="{{$edit->getBannerImageUrl()}}"
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
       
                   

                <div class="form-actions">
                  <button type="submit" class="btn blue">Submit</button>
                    <a href="{{url('admin/bannerlist')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection
@section('script')

  
   
   
@endsection