<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('public/admin_asset/assets/admin/pages/css/login.css')}}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('public/admin_asset/assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/admin/layout/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ asset('public/admin_asset/assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('public/admin_asset/assets/admin/layout4/css/toster.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="">
	<h2 class="text-light">Admin Panle</h2>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	 {!! Form::open(['route' => 'userlogin',
                            'id' =>'loginValidation',
                          'class'=>'FromSubmit login-form',
                          'redirect_url' =>route('admin')]) !!}
            <h3 class="form-title">Sign In</h3>
                <div class="form-body">
               
                 <div class="form-group">
                
                {{ Form::text('email',old('email') ,['class' => 'form-control','placeholder'=>'Email','autofocus'=>'true'])
                 }}      
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                {{ Form::text('password',old('password') ,['class' => 'form-control password','placeholder'=>'Password'])
                 }}  

                </div>
                <div class="form-group">
                	{{ Form::checkbox('remember',false,['class' => 'form-control'])
                 }}
                    <label class="control-label">Remember Me</label>
                      
                </div>

                   
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn blue">Submit</button>
                </div>
                    {!! Form::close() !!}
	{{-- <form class="login-form FromSubmit" id="LoginForm"  action="{{ route('userlogin') }}" method="post">
		@csrf
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
	 <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix @error('email') is-invalid @enderror"  type="email" autocomplete="off" placeholder="email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix @error('password') is-invalid @enderror" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase"> Login</button>
			<label class="rememberme check">
			
		</div>
	
	</form> --}}
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	
	<!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
	 2021© Harsh Vaghasiya. Admin Dashboard.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>

<![endif]-->
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('public/admin_asset/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('public/admin_asset/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
 <script src="{{ asset('public/admin_asset/assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin_asset/assets/admin/layout4/scripts/toastr.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('public/admin_asset/assets/admin/layout4/scripts/jquery.bootstrap-growl.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/admin_asset/assets/admin/layout/scripts/demo.js')}}" type="text/javascript"></script>
{{-- <script src="{{ asset('public/admin_asset/assets/admin/pages/scripts/login.js')}}" type="text/javascript"></script>
 --}}
 <script src="{{ asset('public/admin_asset/common.js')}}" type="text/javascript"></script>
 @include('admin.Z_include.flashmsg')
<!-- END PAGE LEVEL SCRIPTS -->
<script>

jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
// Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>