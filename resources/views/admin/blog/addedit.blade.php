@extends('admin.layout')
@if(isset($edit))

@section('title','Edit Blog')

@else

@section('title','Add Blog')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1>Edit Blog </h1>
        </div>

       @else

      <div class="page-title">
            <h1>Add Blog </h1>
        </div>

       @endif
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
              @if(isset($edit))
            <div class="caption">
                <i class="fa fa-gift"></i> Edit Blog
            </div>
              @else
            <div class="caption">
                <i class="fa fa-gift"></i> Add Blog
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
           {{Form::model($edit, ['route' => ['upd_blog', $edit],
                                   'id' =>'blogValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('blogListMain')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
                 }}  
            @else
           
            {!! Form::open(['route' => 'blogstore',
                            'id' =>'blogValidation',
                          'class'=>'FromSubmit ',
                          'redirect_url' =>route('blogListMain')]) !!}
            @endif   
                <div class="form-body">
                <div class="form-group">
                    <label class="control-label">Title</label>
                {{ Form::text('title',old('title') ,['id'=>'title','class' => 'form-control','placeholder'=>'Title'])
                 }}      
                </div>
                 <hr>
                <div class="form-group">
                    <label class="control-label">Catagory</label>    
                @if(isset($edit))
                
                 <div class="row">
                   @foreach($catagory_list as $value)
                    <div class="col-md-4">
                        <input type="checkbox" value="{{$value->id}}" name="catagory[]" @if(in_array($value->id,$check_catagory))
                          checked 
                        @endif >{{$value->catagory}}
                    </div>
                  @endforeach
                   
                 </div>
                @else
                 {{ Form::select('catagory[]', \App\blog::getCatagoryDropdown(),null,['class' => 'form-control js-example-placeholder-multiple',
                    'multiple'=>"multiple"])}} 
                  
                @endif
                     
            

                </div>
                 <hr>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        {{ Form::textarea('description',old('description'), ['id'=>'description','class' => ' form-control','row'=>'8','placeholder'=>'Description'])
                         }} 
                    </div>
                   
                       <hr>
                     
                     
                       <div class="form-group">
                            <label for="exampleInputFile1">Cover Image</label>
                            {{Form::file('image',['class'=>'','onchange'=>"loadFile(event)"])}}
                       </div>
                        <p class="help-block">
                            <img id="output"  @if(isset($edit)) 
                                              src="{{$edit->getBlogImageUrl()}}"
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
                     <hr>
                   <div class="form-group">
                       <label class="control-label">Tag</label>
                       <div class="row">
                        @foreach($tag_list as $value)
                         <div class="col-md-4">
                          <input type="checkbox" value="{{$value->id}}" name="tag[]" @if(isset($edit))@if(in_array($value->id,$check_tag ))
                          checked 
                        @endif @endif>{{$value->tag}}
                        </div>
                        @endforeach
                   </div>

                      <hr>
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
                    <a href="{{url('/admin/bloglist')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection
@section('script')
    <script>
        var editor = CKEDITOR.replace( 'description', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection