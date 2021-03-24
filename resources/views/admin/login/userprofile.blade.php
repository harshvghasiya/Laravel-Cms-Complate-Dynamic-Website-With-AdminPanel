@extends('admin.layout')
@section('title','User Profile')
@section('container')

	@php
		$account_private_status_id=$key->acount_privacy;
		if($account_private_status_id==1){
		$account_private_status='Private Account';
		// $account_prrivate_route="{{route('follow_user')}}";

		}else{
	    $account_private_status='Not Private Account';
	    // $account_prrivate_route="{{route('follow_user')}}";
	    }
	@endphp
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>User Account <small>user account page sample</small></h1>
				</div>
				<!-- END PAGE TITLE -->
				<!-- BEGIN PAGE TOOLBAR -->
				
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="index.html">Home</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">Pages</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">User Account</a>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar" style="width:250px;">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								@if($key->image != null && $key->image != 'noimage.png')
								<img src="{{ asset('/public/storage/userimage/'.$key->image.'')}}" class="img-responsive" alt="">
								@else
								
							    <img  src="{{asset("/public/storage/blogimage/noimage.png")}}"  class="img-responsive" alt=""/>
								@endif
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									  {{$key->name}}
								</div>
								<div class="profile-usertitle-job">
									 Developer
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
						
							<div id="static2" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false">
								<div class="modal-body">
									
						         {{\App\userfollow::FollowerList(Auth::guard('adminlogin')->user()->id)}}			   
										
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
									{{-- <button type="button" data-dismiss="modal" class="btn blue">Continue Task</button> --}}
								</div>
							</div>
							@section('script')
							
							   @if(Auth::guard('adminlogin')->user()->email == $key->email)
						            <script type="text/javascript">
								    	$('.userprofile').removeAttr('disabled');
								         			   
							 		</script>
							 	@endif

							@endsection

							<!-- END SIDEBAR BUTTONS -->
							<!-- SIDEBAR MENU -->
							<div class="profile-usermenu">
								<ul class="nav">
									
									<li class="active">
										<a href="">
										<i class="icon-settings"></i>
										Account Settings </a>
									</li>
									
									
								</ul>
							</div>
							<!-- END MENU -->
						</div>
						<!-- END PORTLET MAIN -->
					
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											
											<span class="caption-subject font-blue-madison bold uppercase">Profile Account  </span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Personal Info</a>
											</li>
											<li>
												<a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
											</li>
											
										</ul>
									</div>

								
									<div class="portlet-body">
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane active" id="tab_1_1">
											 {!! Form::open(['route' => 'upd_user',
                    								         'id' =>'adminValidation',
                  								   	         'class'=>'FromSubmit login-form',
                                                             'redirect_url' =>route('userListMain')]) !!}
                                                    <input type="text" name="id" class="form-control userprofile hidden" value="{{$key->id}}" disabled="disabled"/>         
													<div class="form-group">
														<label class="control-label"> Name</label>
														<input type="text" name="name" placeholder="{{$key->name}}" class="form-control userprofile" disabled="disabled"/>
													</div>
													<div class="form-group">
														<label class="control-label"> Email</label>
														<input type="email" name="email" placeholder="{{$key->email}}" class="form-control userprofile" disabled="disabled"/>
													</div>
													
													<div class="form-group">
														<label class="control-label">Mobile Number</label>
														<input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control userprofile" disabled="disabled"/>
													</div>
													<div class="form-group">
														<label class="control-label">Interests</label>
														<input type="text" placeholder="Design, Web etc." class="form-control userprofile" disabled="disabled"/>
													</div>
													<div class="form-group">
														<label class="control-label">Occupation</label>
														<input type="text" placeholder="Web Developer" class="form-control userprofile" disabled="disabled"/>
													</div>
													<div class="form-group">
														<label class="control-label">About</label>
														<textarea class="form-control userprofile" rows="3" disabled="disabled" placeholder="We are KeenThemes!!!"></textarea>
													</div>
													<div class="form-group">
														<label class="control-label">Website Url</label>
														<input type="text" placeholder="http://www.mywebsite.com" disabled="disabled" class="form-control userprofile"/>
													</div>
										    @if(Auth::guard('adminlogin')->user()->email ==$key->email)
										        <div class="margiv-top-10">
														<button type="submit" class="btn green-haze">
														Save Changes </button>
														<a href="javascript:;" class="btn default">
														Cancel </a>
											    </div>
											 
											@endif
													
												 {!! Form::close() !!}
											</div>
											
												
											<!-- END PERSONAL INFO TAB -->
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_1_2">
												
													 {!! Form::open(['route' => 'upd_user_image',
                    								         'id' =>'adminValidation',
                  								   	         'class'=>'FromSubmit login-form',
                                                             'redirect_url' =>route('userListMain')]) !!}
                                                    <input type="text" name="id" class="form-control userprofile hidden" value="{{$key->id}}" disabled="disabled"/>     
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																@if($key->image != null && $key->image != 'noimage.png')
													 <img id="output" src="{{asset("/public/storage/userimage/$key->image")}}" alt=""/>
																@else
													 <img id="output" src="{{asset("/public/storage/blogimage/noimage.png")}}" alt=""/>
																@endif
																
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															@if(Auth::guard('adminlogin')->user()->email ==$key->email)
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
															<input type="file"  onchange="loadFile(event)" name="image">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
															@endif
														</div>
														
													</div>
													@if(Auth::guard('adminlogin')->user()->email ==$key->email)
													<div class="margin-top-10">
														<button type="submit" class="btn green-haze">
														Submit </button>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>

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
													@endif
												{{Form::close()}}
											</div>
											<!-- END CHANGE AVATAR TAB -->
											<!-- CHANGE PASSWORD TAB -->
										 @if(Auth::guard('adminlogin')->user()->email ==$key->email)
											<div class="tab-pane" id="tab_1_3">
												 {!! Form::open(['route' => 'change_password',
                    								         'id' =>'adminValidation',
                  								   	         'class'=>'FromSubmit login-form',
                                                             'redirect_url' =>route('userListMain')]) !!}
													<div class="form-group">
														{{-- {{dd(Auth::check())}} --}}
														<label class="control-label">Current Password</label>
														<input type="password" name="current_password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" name="new_password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" name="new_password" class="form-control"/>
													</div>
													<div class="margin-top-10">
														<button type="submit" class="btn green-haze">
														Change Password </a>
														<a href="javascript:;" class="btn default">
														Cancel </a>
													</div>
												{{Form::close()}}
											</div>

											<!-- END CHANGE PASSWORD TAB -->
											<!-- PRIVACY SETTINGS TAB -->
											
											<div class="tab-pane" id="tab_1_4">
											 {!! Form::open(['route' => 'account_private',
                    								         'id' =>'adminValidation',
                  								   	         'class'=>'FromSubmit login-form',
                                                             'redirect_url' =>route('userListMain')]) !!}
													<input type="text" name="id" class="form-control userprofile hidden" value="{{$key->id}}" disabled="disabled"/>
													<table class="table table-light table-hover">
													<tr>
														<td>
															 Make Your Account Private
														</td>
														<td>
															<label class="uniform-inline">
												 {{ Form::radio('acount_privacy', '1', true, ['id'=>'optionsRadios4'])}}
															Yes </label>
															<label class="uniform-inline">
												 {{ Form::radio('acount_privacy', '0', false, ['id'=>'optionsRadios4'])}}
														
															No </label>
														</td>
													</tr>
													</table>
													<!--end profile-settings-->
													<div class="margin-top-10">
														<button type="submit" class="btn green-haze">
														Save Changes </button>
														
													</div>
												{{Form::close()}}
											</div>
											
											@endif
											<!-- END PRIVACY SETTINGS TAB -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	
@endsection
