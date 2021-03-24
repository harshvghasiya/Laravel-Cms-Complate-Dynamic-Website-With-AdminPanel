@php
$author_desc=\App\setting::find(1);
$banner=\App\banner::where('status','Active')->where('name','client')->get();
$our_top_web_solution=\App\cms::where('status','Active')->where('module_id',our_top_web_solution_module_id)->get();
$services=\App\cms::where('status','Active')->where('module_id',services_module_id)->get();
$about=\App\cms::where('status','Active')->where('module_id',about_module_id)->get();
$portfolio=\App\portfolio::where('status','Active')->get();
$portfolio_name=\App\portfolio::where('status','Active')->select('name')->distinct()->get();
$testimonials=\App\testimonial::where('status','Active')->get();
$qna=\App\qna::where('status','Active')->get();
// $unquie_portfolio=array_unique();
// dd($portfolio);
@endphp
@extends('front.layout')
@section('title','Home')
@section('container')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          <h1>Bettter digital experience with Presento</h1>
          <h2>We are team of talanted designers making websites with Bootstrap</h2>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">
        <div class="owl-carousel clients-carousel">
          @if(!$banner->isEmpty())
          @foreach($banner as $result)
           <img src="{{ url('public/storage/bannerimage/'.$result->image ) }}" alt="">
          @endforeach
          @endif
          
         
        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch">
            <div class="content">
              <h3>Voluptatem dignissimos provident quasi</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
              <a href="#" class="about-btn"><span>About us</span> <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Corporis voluptates sit</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Ullamco laboris nisi</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Labore consequatur</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Beatae veritatis</h4>
                  <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
   
    <!-- ======= Tabs Section ======= -->
    <section id="tabs" class="tabs">
      <div class="section-title">
    <h2  data-aos="fade-up">OUR TOP WEB DEVELOPMENT SOLUTIONS</h2>
     </div>
      <div class="container" data-aos="fade-up">
 
        <ul class="nav nav-tabs row d-flex">
          <?php 
          if(!$our_top_web_solution->isEmpty()){
           $x=1;
          foreach($our_top_web_solution as $key){

          echo  '<li class="nav-item col-3">
            <a class="nav-link  show" data-bs-toggle="tab" data-bs-target="#tab-'.$x.'">
              <i class="ri-gps-line"></i>
              <h4 class="d-none d-lg-block">'.$key->name.'</h4>
            </a>
          </li>';
          $x=$x+1;
          }
          }
          ?>
        </ul>

        <div class="tab-content">

          <?php
          if(!$our_top_web_solution->isEmpty()){
           $x=1;
          foreach($our_top_web_solution as $key){
           echo '<div class="tab-pane  show" id="tab-'.$x.'">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                <h3>'.$key->name.'</h3>
                <p class="font-italic">
                  '.$key->seo_description.'
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="'.asset("/public/storage/cmsimage/$key->image") .'" alt="" class="img-fluid">
              </div>
            </div>
          </div>';
 $x=$x+1;
          }

        } 

          ?>
         
         
        </div>

      </div>
    </section><!-- End Tabs Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Our Services</p>
        </div>
       

        <div class="row">

      
          @if(!$services->isEmpty())
          @foreach($services as $key)
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <i class="icofont-earth"></i>
              <h4><a href="#">{{$key->name}}</a></h4>
              <p>{{$key->seo_description}}..</p>
            </div>
          </div>
          @endforeach
          @else
          <h2 class="text-center text-dark">Service Page Not Avalible For Now</h2>
          @endif
        
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @if(!$portfolio_name->isEmpty())
               
              @foreach($portfolio_name as $key)
              <li data-filter=".filter-{{$key->name}}">{{$key->name}}</li>
              
              @endforeach
              @endif

            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
             @if(!$portfolio->isEmpty())

            @foreach($portfolio as $key)

          <div class="col-lg-4 col-md-6 portfolio-item filter-{{$key->name}}">
            <div class="portfolio-wrap">
              <img src="{{ asset("/public/storage/portfolioimage/$key->image") }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$key->name}}</h4>
               
                <div class="portfolio-links">
                  <a href="{{ asset("/public/storage/portfolioimage/$key->image") }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endif

         

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Testimonials</h2>
          
        </div>

        <div class="owl-carousel testimonials-carousel">
         @if(!$testimonials->isEmpty())
           @foreach($testimonials as $result)
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="{{ asset("public/storage/testimonialimage/$result->image" ) }}" class="testimonial-img" alt="">
              <h3>{{$result->name}}</h3>
              <h4>{{$result->role}}</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{$result->about}}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
           @endforeach
         @endif

        
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Pricing Section ======= -->
   
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list accordion" data-aos="fade-up">
           @if(!$qna->isEmpty())
          @php  $y=1; @endphp
          @foreach($qna as $qn)
          <li>
            <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq{{$y}}">{{$qn->question}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq{{$y}}" class="collapse" data-bs-parent=".faq-list">
              <p>
               {{$qn->answer}}
              </p>
            </div>
          </li>
          @php $y++ @endphp
          @endforeach
          @endif
        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Team Section ======= -->
 {{--    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ asset('front_asset/assets/img/team/team-1.jpg' ) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="{{ asset('front_asset/assets/img/team/team-2.jpg' ) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="{{ asset('front_asset/assets/img/team/team-3.jpg' ) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="{{ asset('front_asset/assets/img/team/team-4.jpg' ) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section --> --}}

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>@php echo $author_desc->author_decription_footer @endphp</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  @php echo $author_desc->address @endphp
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>{{$author_desc->first_email}}<br>{{$author_desc->second_email}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+91 {{$author_desc->first_mobile}}{{-- <br>+91 {{$author_desc->first_mobile}} --}}</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
             {!! Form::open(['route' => 'contactus',
                            
                          'class'=>'php-email-form',
                          'role'=>'form']) !!}
              <div class="row">
                <div class="col form-group">
                   {{ Form::text('name',old('name') ,['class' => 'form-control','id'=>'name','placeholder'=>'Your Name',
                                                      'data-rule'=>'minlen:2', 'data-msg'=>"Please enter at least 4 chars" ]) }}   
                 
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                   {{ Form::text('email',old('email') ,['class' => 'form-control','id'=>'email','placeholder'=>'Your  Email','data-rule'=>'minlen:2', 'data-msg'=>"Please enter a Valid Email" ]) }} 
                 
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                 {{ Form::text('subject',old('subject') ,['class' => 'form-control','id'=>'subject','placeholder'=>'Your Subject','data-rule'=>'minlen:6', 'data-msg'=>"Please enter at least 8 chars of subject" ]) }} 
                <div class="validate"></div>
              </div>
              <div class="form-group">
                 {{ Form::textarea('message',old('message') ,['class' => 'form-control','id'=>'message','placeholder'=>'Your message','data-rule'=>'required', 'data-msg'=>"Please write something for us" ]) }}
               
                <div class="validate"></div>
              </div>
              <div class="mb-3">
               
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              @if(isset(Auth::user()->id))
              <button type="submit" id="sub">Send Message</button>
              @else
              <h3 class="text-center text-secondary">Login First For Leave Message</h3>
              @endif

             {!! Form::close() !!}
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection
