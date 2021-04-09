@extends('admin.layout')

@section('title','Setting')

@section('container')
<div class="page-content">
  <div class="portlet box green">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-gift"></i>Settings
      </div>
      <div class="tools">
        <a href="javascript:;" class="collapse">
        </a>

      </div>
    </div>
    <div class="portlet-body form">
      <!-- BEGIN FORM-->
      {{Form::model($edit, ['route' => ['upd_setting', $edit],
                           'id' =>'settingValidation',
                           'class'=>'FromSubmit form-horizontal',
                           'method'=>'put',
                           'redirect_url' =>route('setting_create')])}}
      {{ Form::text('id',old('id') ,['class' => 'form-control hidden'])}}   
        <div class="form-body">
          <h3 class="form-section">Basic Info</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Website URl</label>
                <div class="col-md-9">
                  {{ Form::text('web_url',old('web_url') ,['class' => 'form-control']) }} 
                 
                </div>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Author Name</label>
                <div class="col-md-9">
                  {{ Form::text('author_name',old('author_name') ,['class' => 'form-control']) }} 
                </div>
              </div>
            </div>
            
          </div>
          <!--/row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">First Email</label>
                <div class="col-md-9">
                    {{ Form::text('first_email',old('first_email') ,['class' => 'form-control'])}}
                </div>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Second Email</label>
                <div class="col-md-9">
                   {{ Form::text('second_email',old('second_email') ,['class' => 'form-control']) }}  
                </div>
              </div>
            </div>
            
          </div>
          <!--/row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">First Mobile</label>
                <div class="col-md-9">
                 {{ Form::text('first_mobile',old('first_mobile') ,['class' => 'form-control']) }}  
                </div>
              </div>
            </div>
           
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Second Mobile</label>
                <div class="col-md-9">
                  {{ Form::text('second_mobile',old('second_mobile') ,['class' => 'form-control']) }} 
                </div>
              </div>
            </div>
           
          </div>
          <h3 class="form-section">Description Detail</h3>
          <!--/row-->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Author Description Footer</label>
                <div class="col-md-9">
                   {{ Form::textarea('author_decription_footer',old('author_decription_footer') ,['id'=>'author_decription_footer','class' => 'form-control','row'=>'1']) }} 
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Author Description Sidebar</label>
                <div class="col-md-9">
                    {{ Form::textarea('author_decription_sidebar',old('author_decription_sidebar') ,['id'=>'author_decription_sidebar','class' => 'form-control','row'=>'1']) }} 
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Address</label>
                <div class="col-md-9">
                  {{ Form::textarea('address',old('address') ,['id'=>'address', 'class' => 'form-control','row'=>'3']) }} 
                </div>
              </div>
            </div>
          </div>
          <!--/row-->
          <h3 class="form-section">Upload Image</h3>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Logo Image</label>
                <div class="col-md-9">
                  {{Form::file('logo_image',['class'=>'','onchange'=>"loadFile3(event)",'id'=>'filer_input2','data-jfiler-showThumbs'=>'true'])}}     
                  <div class="help-block col-sm-6">
                    <img id="output3" src="{{$edit->getLogoImageUrl()}}" width="200px" ; height="200px" ; />
                  </div>
               </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Favicon Image</label>
                <div class="col-md-9">
                  {{Form::file('favicon',['class'=>'','onchange'=>"loadFile2(event)",'id'=>'filer_input3','data-jfiler-showThumbs'=>'true'])}}     
                  <div class="help-block col-sm-6">
                    <img id="output2" src="{{$edit->getFaviconImageUrl()}}" width="200px" ; height="200px" ; />
                  </div>
               </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-3">Aurthor Image</label>
                <div class="col-md-9">
                  {{Form::file('image',['class'=>'','onchange'=>"loadFile1(event)",'id'=>'filer_input','data-jfiler-showThumbs'=>'true'])}}     
                  <div class="help-block col-sm-6">
                    <img id="output1" src="{{$edit->getAuthorImageUrl()}}" width="200px" ; height="200px" ; />
                  </div>
                </div>
              </div>
            </div>           
          </div>

        </div>
        <div class="form-actions">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-offset-3 col-md-9">
                  <button type="submit" class="btn green">Submit</button>
                  <a href="{{url('/admin')}}" class="btn default">Cancel</a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
            </div>
          </div>
        </div>
      </form>
      <!-- END FORM-->
    </div>
  </div>
 
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

    <script>
     var loadFile1 = function(event) {
       var output = document.getElementById('output1');
       output.src = URL.createObjectURL(event.target.files[0]);
       output.onload = function() {
         URL.revokeObjectURL(output.src) 
       }
     };
   </script>   
    <script>
     var loadFile2= function(event) {
       var output = document.getElementById('output2');
       output.src = URL.createObjectURL(event.target.files[0]);
       output.onload = function() {
         URL.revokeObjectURL(output.src) 
       }
     };
   </script>  
     <script>
     var loadFile3 = function(event) {
       var output = document.getElementById('output3');
       output.src = URL.createObjectURL(event.target.files[0]);
       output.onload = function() {
         URL.revokeObjectURL(output.src) 
       }
     };
   </script>
   <script >
     $('#filer_input').filer(); 
     $('#filer_input2').filer(); 
     $('#filer_input3').filer(); 
     
   </script>


@endsection