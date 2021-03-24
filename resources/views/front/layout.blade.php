
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title','Home')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Favicons -->
  <link href="{{ asset('public/front_asset/assets/img/favicon.png' ) }}" rel="icon">
  <link href="{{ asset('public/front_asset/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{ asset('public/admin_asset/assets/admin/layout4/css/toster.css') }}" rel="stylesheet" type="text/css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('public/front_asset/assets/vendor/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet">
  <link href="{{ asset('public/front_asset/assets/vendor/icofont/icofont.min.css' ) }}" rel="stylesheet">
  <link href="{{ asset('public/front_asset/assets/vendor/boxicons/css/boxicons.min.css' ) }}" rel="stylesheet">
  <link href="{{ asset('public/front_asset/assets/vendor/owl.carousel/assets/owl.carousel.min.css' ) }}" rel="stylesheet">
  <link href="{{ asset('public/front_asset/assets/vendor/remixicon/remixicon.css' ) }}" rel="stylesheet">
  <link href="{{ asset('public/front_asset/assets/vendor/venobox/venobox.css' ) }}" rel="stylesheet">
  <link href="{{ asset('public/front_asset/assets/vendor/aos/aos.css' ) }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('public/front_asset/assets/css/style.css' ) }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Presento - v2.0.3
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Presento<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('public/front_asset/assets/assets/img/logo.png' ) }}" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{route('home')}}">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          {{-- <li><a href="#team">Team</a></li> --}}
          <li><a href="{{route('front_blog')}}">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
         @if(!isset(Auth::user()->id))
         <li><a href="" data-toggle="modal" data-target="#loginmodal" >Login</a></li>
          <li><a href="" data-toggle="modal" data-target="#exampleModal" >Register</a></li>
         @else
          <li class="drop-down"><a href="">{{Auth::user()->name}}</a>
            <ul>             
              <li><a href="{{route('front_logout')}}">Logout</a></li>
            </ul>
          </li>
         @endif

          
        </ul>
      </nav><!-- .nav-menu -->

      {{-- <a href="#about" class="get-started-btn scrollto">Get Started</a> --}}
    </div>
  </header><!-- End Header -->


@yield('container')

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('front_user_register')}}" class="FromSubmit" id="userValidation" redirect_url="{{route('home')}}">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1"> UserName</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter UserName">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
          </div>
         
         
         <button type="submit"  class="btn btn-dark">Submit</button>
      </div>
      <div class="modal-footer">
       
      </div>
       </form>
    </div>
  </div>
</div>



<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('front_user_login')}}" class="FromSubmit" id="userValidation" redirect_url="{{route('home')}}">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
          </div>

          
         
         
      </div>

      <div class="modal-footer">
        <div class="form-group">
<button type="submit"  class="btn btn-secondary">Submit</button>
           
          </div>
         
      </div>
       </form>
    </div>
  </div>
</div>





@include('admin.Z_include.flashmsg')
@include('front.footer')

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('public/front_asset/assets/vendor/jquery/jquery.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/jquery.easing/jquery.easing.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/php-email-form/validate.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/owl.carousel/owl.carousel.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/waypoints/jquery.waypoints.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/counterup/counterup.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/isotope-layout/isotope.pkgd.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/venobox/venobox.min.js' ) }}"></script>
  <script src="{{ asset('public/front_asset/assets/vendor/aos/aos.js' ) }}"></script>
  <script src="{{ asset('public/admin_asset/assets/admin/layout4/scripts/toastr.min.js') }}" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js
" type="text/javascript" charset="utf-8" async defer></script>
  <script src="{{ asset('public/front_asset/assets/js/main.js' ) }}"></script>
  <script src="{{ asset('public/admin_asset/common.js') }}"></script>




</body>

</html>
@yield('script')