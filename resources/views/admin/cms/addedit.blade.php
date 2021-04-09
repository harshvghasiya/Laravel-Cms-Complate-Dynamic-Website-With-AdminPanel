@extends('admin.layout')
@if(isset($edit))

@section('title','Edit Cms')

@else

@section('title','Add Cms')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1>Edit Cms </h1>
        </div>

       @else

      <div class="page-title">
            <h1>Add Cms </h1>
        </div>

       @endif
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
              @if(isset($edit))
            <div class="caption">
                <i class="fa fa-gift"></i> Edit Cms
            </div>
              @else
            <div class="caption">
                <i class="fa fa-gift"></i> Add Cms
            </div>
             @endif
            
            <div class="tools">
                <a href="" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            @if(isset($edit))
           {{Form::model($edit, ['route' => ['upd_cms', $edit],
                                   'id' =>'cmsValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('cmsListMain')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
                 }}  
            @else
           
            {!! Form::open(['route' => 'cmsstore',
                            'id' =>'cmsValidation',
                          'class'=>'FromSubmit ',
                          'redirect_url' =>route('cmsListMain')]) !!}
            @endif   
                <div class="form-body">
                  <h3 class="form-section">Content Info</h3>
                  <div class="row">
                 <div class="form-group col-md-6">
                    <label class="control-label">Module Catagory</label>
                 
                      {{ Form::select('module', \App\cms::getModuleDropdown(),null,['class' => 'form-control js-example-placeholder-single js-state']) }}    
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Parent Catagory</label>
                 
                      {{ Form::select('parent_id', \App\cms::getParentDropdown(),null,['class' => 'form-control js-example-placeholder js-state']) }}    
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Name</label>
                {{ Form::text('name',old('name') ,['id'=>'name','class' => 'form-control','placeholder'=>'Name'])
                 }}      
                </div>

                 <div class="form-group col-md-6">
                    <label class="control-label">Secondary Title</label>
                {{ Form::text('secondary_title',old('secondary_title') ,['id'=>'secondary_title','class' => 'form-control','placeholder'=>'Secondary Title'])
                 }}      
                </div>

                 <div class="form-group col-md-6">
                        <label>Display On Footer</label>
                        <div class="radio-list">
                            <label class="radio-inline">
                                {{ Form::radio('display_on_footer', 'Yes', true, ['id'=>'optionsRadios4'])}}
                              Yes
                            <label class="radio-inline">

                                 {{ Form::radio('display_on_footer', 'No',null ,['id'=>'optionsRadios5'])}}
                           No
                        </div>
                    </div>

                     <div class="form-group col-md-6">
                        <label>Display On Header</label>
                        <div class="radio-list">
                            <label class="radio-inline">
                                {{ Form::radio('display_on_header', 'Yes', true, ['id'=>'optionsRadios4'])}}
                           Yes
                            <label class="radio-inline">

                                 {{ Form::radio('display_on_header', 'No',null ,['id'=>'optionsRadios5'])}}
                           No
                        </div>
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
                                              src="{{$edit->getCmsImageUrl()}}"
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
                        <h3 class="form-section">SEO</h3>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label">SEO Title</label>
                       {{ Form::text('seo_title',old('seo_title') ,['id'=>'seo_title','class' => 'form-control','placeholder'=>'SEO Title'])
                        }}      
                    </div> 
                     <div class="form-group col-md-6">
                        <label class="control-label">SEO Keyword</label>
                       {{ Form::text('seo_keyword',old('seo_keyword') ,['id'=>'seo_keyword','class' => 'form-control','placeholder'=>'SEO Keyword'])
                        }}      
                    </div>
                     <div class="form-group col-md-6">
                        <label class="control-label">Description</label>
                        {{ Form::textarea('seo_description',old('seo_description'), ['id'=>'description','class' => ' form-control','row'=>'8','placeholder'=>'Description'])
                         }} 
                    </div>
                 
                </div>
                <h3 class="form-section">Description</h3>
                <div class="row">
                  
                  <div class="form-group col-md-6">
                        <label class="control-label">Short Description</label>
                        {{ Form::textarea('short_description',old('description'), ['id'=>'short_description','class' => ' form-control','row'=>'8','placeholder'=>'Short Description'])
                         }} 
                  </div>
                  <div class="form-group col-md-6">
                        <label class="control-label">Long Description</label>
                        {{ Form::textarea('long_description',old('description'), ['id'=>'long_description','class' => ' form-control','row'=>'8','placeholder'=>'Long Description'])
                         }} 
                    </div>
                </div>
                 
                   

                <div class="form-actions">
                  <button type="submit" class="btn blue">Submit</button>
                    <a href="{{url('admin/cmslist')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection
@section('script')

  
     <script>
        var editor = CKEDITOR.replace( 'short_description', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>  
     <script>
        var editor = CKEDITOR.replace( 'long_description', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>
   
@endsection