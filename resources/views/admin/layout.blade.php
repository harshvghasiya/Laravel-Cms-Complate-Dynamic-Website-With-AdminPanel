<!DOCTYPE html>
<html lang="en" class="no-js">

@include('admin.Z_include.header');
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
    
    {{-- {{ flashMessage()}} --}}
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{url('/')}}">
                 <h3 alt="logo" class="logo-default">Admin Panle</h3>  {{--  <img src="{{ asset('admin_asset/assets/admin/layout4/img/logo-light.png') }}" alt="logo"
                        class="logo-default" /> --}}
                </a>
                <div class="menu-toggler sidebar-toggler">
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                data-target=".navbar-collapse">
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN PAGE ACTIONS -->
            <!-- DOC: Remove "hide" class to enable the page header actions -->
         
            <!-- END PAGE ACTIONS -->
            <!-- BEGIN PAGE TOP -->
            <div class="page-top">
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                      
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <span class="username username-hide-on-mobile">
                                     {{ Auth::guard('adminlogin')->user()->name }} </span>
                                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                @if( Auth::guard('adminlogin')->user()->image != 'noimage.png')
                                <img alt="" class="img-circle"
                                    src="{{ asset("/public/storage/userimage/".Auth::guard('adminlogin')->user()->image) }}" />
                                @else
                                <img alt="" class="img-circle"
                                    src="{{ asset("/public/storage/blogimage/noimage.png") }}" />
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{route('viewuser',Crypt::encrypt(Auth::guard('adminlogin')->user()->email))}}">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                

                                <li>
                                    <a href="{{ route('logout') }}">
                                        <i class="icon-key"></i> Log Out </a>

                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END PAGE TOP -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
               
                <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200">
                <li class="start active ">
                    <a href="index.html">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
               
 
                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\SocialMedia::apm_id))
                        <li>
                            <a href="{{route('someListMain')}}">
                                <i class="fa fa-share-alt-square"></i>
                            Social Media </a>
                        </li>
                    @endif



                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\contactus::apm_id))
                        <li>
                            <a href="{{route('contactListMain')}}">
                                <i class="fa fa-phone-square"></i>
                            Contact Us</a>
                        </li>
                    @endif


                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\blog::apm_id))
                        <li>
                            <a href="{{route('blogListMain')}}">
                                <i class="icon-speech"></i>
                            Blog  </a>
                        </li>
                    @endif


                     @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\BlogCatagory::apm_id))
                        <li>
                            <a href="{{route('catagoryListMain')}}">
                                <i class="icon-speech"></i>
                            Catagory </a>
                        </li>
                    @endif


                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\BlogTag::apm_id))
                        <li>
                            <a href="{{route('tagListMain')}}">
                                <i class="icon-link"></i>
                            Tag </a>
                        </li>
                    @endif



                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\setting::apm_id))
                        <li>
                            <a href="{{route('setting_create')}}">
                                <i class="fa fa-gear"></i>
                            Setting </a>
                        </li>
                    @endif


                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\qna::apm_id))
                        <li>
                            <a href="{{route('qnaListMain')}}">
                                <i class="icon-rocket"></i>
                            Qna </a>
                        </li>
                    @endif

                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\testimonial::apm_id))
                        <li>
                            <a href="{{route('testimonialListMain')}}">
                                <i class="fa fa-database"></i>
                            TestiMonial </a>
                        </li>
                    @endif

                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\portfolio::apm_id))
                        <li>
                            <a href="{{route('portListMain')}}">
                                <i class="icon-puzzle"></i>
                            Portfolio </a>
                        </li>
                    @endif 


                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\newsletter::apm_id))
                        <li>
                            <a href="{{route('newListMain')}}">
                                <i class="icon-envelope-open"></i>
                            NewsLetter </a>
                        </li>
                    @endif


                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\AdminLogin::apm_id))
                        <li>
                            <a href="{{route('userListMain')}}">
                                <i class="icon-user"></i>
                            Users </a>
                        </li>
                    @endif 

                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\apmodule::apm_id))
                        <li>
                            <a href="{{route('apmoduleListMain')}}">
                                <i class="icon-folder"></i>
                            Access Modules </a>
                        </li>
                    @endif 

                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\module::apm_id))
                        <li>
                            <a href="{{route('moduleListMain')}}">
                                <i class="icon-wallet"></i>
                             Modules </a>
                        </li>
                    @endif

                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\banner::apm_id))
                        <li>
                            <a href="{{route('bannerListMain')}}">
                                <i class="icon-docs"></i>
                             Banner </a>
                        </li>
                    @endif

                    @if(Acceess(Auth::guard('adminlogin')->user()->id,\App\cms::apm_id))
                        <li>
                            <a href="{{route('cmsListMain')}}">
                                <i class="icon-hourglass"></i>
                             Cms </a>
                        </li>
                    @endif


                  

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            @section('container')
            @show
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner">
            2014 &copy; Metronic by keenthemes.
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->


@include('admin.Z_include.footer')


<!-- END PAGE LEVEL PLUGINS -->
@include('admin.Z_include.flashmsg')

</body>
<!-- END BODY -->
</html>
