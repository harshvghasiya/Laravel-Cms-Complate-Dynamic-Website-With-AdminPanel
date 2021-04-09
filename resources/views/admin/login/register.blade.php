@extends('admin.layout')
@if(isset($edit))

@section('title','Edit User')

@else

@section('title','Add User')

@endif

@section('container')
<div class="page-content">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        @if(isset($edit))

    <div class="page-title">
            <h1>Edit User </h1>
        </div>

       @else

      <div class="page-title">
            <h1>Add User </h1>
        </div>

       @endif
       
        <!-- END PAGE TITLE -->

    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box blue">
        <div class="portlet-title">
              @if(isset($edit))
            <div class="caption">
                <i class="fa fa-gift"></i> Edit User
            </div>
              @else
            <div class="caption">
                <i class="fa fa-gift"></i> Add User
            </div>
             @endif
            
            <div class="tools">
                <a href="" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
           @if(isset($edit))
           {{Form::model($edit, ['route' => ['register_upd', $edit],
             'id' =>'userValidation',
             'class'=>'FromSubmit',
             'method'=>'put',
             'redirect_url' =>route('userListMain')])}}
           {{ Form::text('id',old('id') ,['class' => 'form-control hidden']) }}    
            @else
           
          
            {!! Form::open(['route' => 'userregister',
                            'id' =>'adminValidation',
                          'class'=>'FromSubmit login-form',
                          'redirect_url' =>route('userListMain')]) !!}
            @endif   
                <div class="form-body">
                  <h3 class="form-section"> Persnal Info</h3>
                <div class="form-group">
                    <label class="control-label">Name</label>
                {{ Form::text('name',old('name') ,['class' => 'form-control','placeholder'=>'User Name'])
                 }}      
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                {{ Form::text('email',old('email') ,['class' => 'form-control','placeholder'=>' Email'])
                 }}        
                </div>
                @if(!isset($edit))
                <div class="form-group">
                    <label class="control-label">Password</label>
                {{ Form::text('password',old('password') ,['class' => 'form-control','placeholder'=>'password'])
                 }}      
                </div>
                @endif

                 <h3 class="form-section">Upload Image</h3>
                     
                       <div class="form-group">
                            <label for="exampleInputFile1">Cover Image</label>
                            {{Form::file('image',['class'=>'','onchange'=>"loadFile(event)"])}}
                       </div>
                        <p class="help-block">
                            <img id="output" @if(isset($edit)) 
                                             src="{{$edit->getAdminImageUrl()}}"
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

                 <h3 class="form-section">Module Controller</h3>
                 
                  <div class="row">
                   
                    
                        @php 
                        $x=\App\apmodule::getModuleDropdown();
                        // dd($x);

                        @endphp
                        @foreach($x as  $key=>$value)
                         <div class="col-md-4">
                        
                          @if(isset($edit))
                         <input type="checkbox" class="apm_checkbox" value="{{$value->id}}" name="apm_list[]" @if(in_array($value->id,$apm_check ?? '')) checked @endif>
                         {{$value->name}}

                         @else

                         <input type="checkbox" class="apm_checkbox" value="{{$value->id}}" name="apm_list[]" checked>
                         {{$value->name}}<br>

                         @if(!$value->edit_del_access->isEmpty())
                              
                         @foreach($value->edit_del_access as $result)
                        
                          <div class="col-md-12">
                         <input type="checkbox" class="apm_checkbox " value="{{$result->slug}}" name="get_access[]"  checked>
                         {{$result->name}}
                         </div>
                        
                         @endforeach
                          
                         
                         @endif

                         @endif
                          </div>
                         @endforeach
                      
                   
                  </div>
                   
                
                  
                    <h3 class="form-section"> Status</h3>
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
                    <a href="{{url('admin/userlist')}}" type="button" class="btn default">Cancel</a>
                </div>
                    {!! Form::close() !!}
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


</div>


@endsection