@extends('admin.layout')
@section('title','Home | Dashboard')
@section('container')
<div class="page-content upd_append">
   
<div class="row margin-top-10">

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\blog::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('blogListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-list-alt" aria-hidden="true"></i> <small>Blog </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif


@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\apmodule::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('apmoduleListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-list-alt" aria-hidden="true"></i> <small>Access Controller Modules </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif


@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\AdminLogin::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('userListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-list-alt" aria-hidden="true"></i> <small>User Controller </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\newsletter::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('newListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-list-alt" aria-hidden="true"></i> <small>News Letter </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif



@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\SocialMedia::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('someListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-share-alt-square" aria-hidden="true"></i> <small>Social Media</small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif


@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\portfolio::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('portListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-share-alt-square" aria-hidden="true"></i> <small>PortFolio</small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\qna::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('qnaListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-share-alt-square" aria-hidden="true"></i> <small>Qna</small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\testimonial::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('testimonialListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-share-alt-square" aria-hidden="true"></i> <small>Testimonial List</small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif


@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\module::apm_id))
   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('moduleListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-paper-plane" aria-hidden="true"></i> <small>Module </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\cms::apm_id))
     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('cmsListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-paper-plane" aria-hidden="true"></i> <small>CMS </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\catagory::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('catagoryListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-database" aria-hidden="true"></i> <small>Catagory</small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\setting::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('setting_create')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-gear" aria-hidden="true"></i> <small>Settings </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif


@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\BlogTag::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('tagListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-gear" aria-hidden="true"></i> <small>Blog Tag List Main </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\banner::apm_id))
 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('bannerListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-share-alt-square" aria-hidden="true"></i> <small> Banner</small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

@if(Acceess(Auth::guard('adminlogin')->user()->id,\App\contactus::apm_id))
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2">
      <a href="{{route('contactListMain')}}">
        <div class="display">
          <div class="number">
            <div class="icon">
              <i class="fa fa-phone-square" aria-hidden="true"></i> <small>Contact Us </small>
            </div>
          </div>
        </div>
      </a>  
    </div>
  </div>
@endif

</div>
   
</div>


@endsection
