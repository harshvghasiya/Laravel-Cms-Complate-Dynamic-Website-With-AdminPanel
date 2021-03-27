@extends('admin.layout')

@section('title','Setting')

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
  

      <div class="page-title">
            <h1>Settings </h1>
        </div>

     
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
             
            <div class="caption">
                <i class="fa fa-gift"></i> Settings
            </div>
            
            
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
           {{Form::model($edit, ['route' => ['upd_setting', $edit],
                                   'id' =>'settingValidation',
                          'class'=>'FromSubmit',
                          'method'=>'put',
                          'redirect_url' =>route('setting_create')])}}
             {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])
             }}   

                <div class="form-body">
                  <h3>Basic Info</h3><hr>
                  <div class="row">
                    
                 
                <div class="form-group col-md-6">
                    <label class="control-label">Website URl</label>
                {{ Form::text('web_url',old('web_url') ,['class' => 'form-control'])
                 }}                    
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Author Name</label>
                {{ Form::text('author_name',old('author_name') ,['class' => 'form-control'])
                 }}                    
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">First Email</label>
                {{ Form::text('first_email',old('first_email') ,['class' => 'form-control'])
                 }}                    
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Second Email</label>
                {{ Form::text('second_email',old('second_email') ,['class' => 'form-control'])
                 }}                    
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">First Mobile</label>
                {{ Form::text('first_mobile',old('first_mobile') ,['class' => 'form-control'])
                 }}                    
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label"> Second Mobile</label>
                {{ Form::text('second_mobile',old('second_mobile') ,['class' => 'form-control'])
                 }}                    
                </div>

              </div>
              <h3>Description Detatil</h3><hr>
              <div class="row">
                  <div class="form-group col-md-6">
                    <label class="control-label"> Author Description Footer</label>
                {{ Form::textarea('author_decription_footer',old('author_decription_footer') ,['id'=>'author_decription_footer','class' => 'form-control','row'=>'1'])
                 }}                    
                </div>

                  <div class="form-group col-md-6">
                    <label class="control-label"> Author Description Sidebar</label>
                {{ Form::textarea('author_decription_sidebar',old('author_decription_sidebar') ,['id'=>'author_decription_sidebar','class' => 'form-control','row'=>'1'])
                 }}                    
                </div>
                 <div class="form-group col-md-6">
                    <label class="control-label"> Address</label>
                {{ Form::textarea('address',old('address') ,['id'=>'address', 'class' => 'form-control','row'=>'3'])
                 }}                    
                </div>
              </div>
              <h3 class="form-section">Author Image</h3>
                @if(isset($edit))
                     
                       <div class="form-group">
                            <label for="exampleInputFile1">Cover Image</label>
                            {{Form::file('image',['class'=>'','onchange'=>"loadFile(event)"])}}
                       </div>
                        <p class="help-block">
                            <img id="output" src="{{asset("public/storage/authorimage/$edit->image")}}" width="150px" ; height="150px" ; />
                        </p>
                         
                         

                      @else
                       <div class="form-group">
                      <label for="exampleInputFile1">Cover Image</label>
                       {{Form::file('image',['class'=>'','onchange'=>"loadFile(event)"])}}
                        <p class="help-block">
                            <img id="output" src="{{asset("public/storage/blogimage/noimage.png")}}" width="150px" ; height="150px" ; />
                        </p>
                          </div>
                      @endif
                     
                  
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
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn blue">Submit</button>
                    <a href="{{url('/admin')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection
@section('script')
  <script>
        var editor = CKEDITOR.replace( 'address', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>
    <script>
        var editor = CKEDITOR.replace( 'author_decription_footer', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>
    <script>
        var editor = CKEDITOR.replace( 'author_decription_sidebar', {
            
        });
        CKEDITOR.config.allowedContent = true;
    </script>

@endsection