<!DOCTYPE html>
<html lang="en" class="no-js">

@include('admin.Z_include.header');
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
    <div class="page-header navbar navbar-fixed-top">
      
        <div class="page-header-inner">
           
            <div class="page-logo">
                <a href="{{url('/admin')}}">
                 <h3 alt="logo" class="logo-default">Admin Panle</h3> 
                </a>
                <div class="menu-toggler sidebar-toggler">
                    
                </div>
            </div>
           
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                data-target=".navbar-collapse">
            </a>
           
            <div class="page-top">
                
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                      
                        
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <span class="username username-hide-on-mobile">
                                     {{ Auth::guard('adminlogin')->user()->name }} </span>
                               
                                
                                <img alt="UserImage" class="img-circle"
                                    src="{{ Auth::guard('adminlogin')->user()->getAdminImageUrl() }}" />
                                
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
                        
                    </ul>
                </div>
               
            </div>
           
        </div>
        
    </div>
   
    <div class="clearfix">
    </div>
   
    <div class="page-container">
       
        <div class="page-sidebar-wrapper">
          
            <div class="page-sidebar navbar-collapse collapse">
               
                <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200">
                <li class="start active ">
                    <a href="{{route('admin')}}">
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
            
        </div>
    </div>
       
        <div class="page-content-wrapper">
            @section('container')
            @show
        </div>
        
    </div>
   
    <div class="page-footer">
        <div class="page-footer-inner">
            2014 &copy; Metronic by keenthemes.
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
   


@include('admin.Z_include.footer')


@include('admin.Z_include.flashmsg')

</body>
</html>
