@php
$author_desc=\App\setting::find(1);
$banner=\App\banner::where('status','Active')->where('name','client')->get();

$cms=\App\cms::where('status','Active')->get();

$portfolio=\App\portfolio::where('status','Active')->get();
$portfolio_name=\App\portfolio::where('status','Active')->select('name')->distinct()->get();
$testimonials=\App\testimonial::where('status','Active')->get();
$qna=\App\qna::where('status','Active')->get();

@endphp
@extends('front.layout')
@section('title','Home')
@section('container')

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          @foreach($cms as $result)
          @if($result->module_id==header_module_id)
          <h1>{{$result->secondary_title}}</h1>
          <h2>{{$result->seo_description}}</h2>
          @endif
          @endforeach
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
    </div>
  </section>
  <main id="main">

    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">
        <div class="owl-carousel clients-carousel">
          @if(!$banner->isEmpty())
          @foreach($banner as $result)
           <img src="{{$result->getBannerImageUrl()}}" alt="Banner">
          @endforeach
          @endif
          
        </div>
      </div>
    </section>

    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">
            @foreach($cms as $key)
              @if($key->module_id==about_module_id)
                <div class="content">
                  <h3>{{$key->secondary_title}}</h3>
                  <p>
                    {{$key->seo_description}}
                  </p>
                  <a href="{{route('cms_content',$key->name)}}" class="about-btn"><span>About us</span> <i class="bx bx-chevron-right"></i></a>
                </div>
              @endif
            @endforeach
          
      </div>
    </section>

    <section id="tabs" class="tabs">
      <div class="section-title">
    <h2  data-aos="fade-up">OUR TOP WEB DEVELOPMENT SOLUTIONS</h2>
     </div>
      <div class="container" data-aos="fade-up">
 
        <ul class="nav nav-tabs row d-flex">
          
          @if(!$cms->isEmpty())
           @php $x=1 @endphp
            @foreach($cms as $key)
              @if($key->module_id==our_top_web_solution_module_id)
                <li class="nav-item col-3">
                  <a class="nav-link  show" data-bs-toggle="tab" data-bs-target="#tab-{{$x}}">
                    <i class="ri-gps-line"></i>
                    <h4 class="d-none d-lg-block">{{$key->name}}</h4>
                  </a>
                </li>
                @php $x=$x+1 @endphp
              @endif
            @endforeach
          @endif
        
        </ul>

        <div class="tab-content">

          
        @if(!$cms->isEmpty())
          @php $x=1 @endphp
          @foreach($cms as $key)
            @if($key->module_id==our_top_web_solution_module_id)
              <div class="tab-pane  show" id="tab-{{$x}}">
                <div class="row">
                  <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <h3>{{$key->name}}</h3>
                    <p class="font-italic">
                      {{$key->seo_description}}
                    </p>
                  </div>
                  <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{$key->getCmsImageUrl()}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              @php $x=$x+1 @endphp
            @endif
          @endforeach
        @endif

          
         
         
        </div>

      </div>
    </section>

    <section id="services" class="services section-bg ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Our Services</p>
        </div>
       

        <div class="row">

      
          @if(!$cms->isEmpty())
            @foreach($cms as $key)
              @if($key->module_id == services_module_id)
                <div class="col-md-6 mt-4 mt-md-0">
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <i class="icofont-earth"></i>
                    <h4><a href="{{route('cms_content',$key->name)}}">{{$key->secondary_title}}</a></h4>
                    <p>{{substr($key->seo_description,0,150)}}..</p>
                  </div>
                </div>
              @endif
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
              <img src="{{$key->getPortfolioImageUrl()}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{$key->name}}</h4>
               
                <div class="portfolio-links">
                  <a href="{{ $key->getPortfolioImageUrl() }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>

      </div>
    </section>

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
              <img src="{{$result->getTestimonialImageUrl()}}" class="testimonial-img" alt="">
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
    </section>

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
    </section>

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
                  <p><a href="mailto:{{$author_desc->first_email}}">{{$author_desc->first_email}}</a>
                    <br>
                    <a href="mailto:{{$author_desc->second_email}}">{{$author_desc->second_email}}</a>
                    
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p><a href="tel:+91{{$author_desc->first_mobile}}">+91 {{$author_desc->first_mobile}}</a></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
             {!! Form::open(['route' => 'contactus',      
                             'class'=>'php-email-form',
                             'id'=>'Contactus',
                             ]) !!}
              <div class="row">
                <div class="col form-group">
                   {{ Form::text('name',old('name') ,['class' => 'form-control','id'=>'name','placeholder'=>'Your Name',
                                                      'data-rule'=>'minlen:2', 'data-msg'=>"Please enter at least 4 chars" ]) }}   
                 
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                   {{ Form::text('email',old('email') ,['class' => 'form-control email','id'=>'email','placeholder'=>'Your  Email','data-rule'=>'email', 'data-msg'=>"Please enter a Valid Email" ]) }} 
                 
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
              <button type="submit" >Send Message</button>
              @else
              <h3 class="text-center text-secondary">Login First For Leave Message</h3>
              @endif
             {!! Form::close() !!}
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection
