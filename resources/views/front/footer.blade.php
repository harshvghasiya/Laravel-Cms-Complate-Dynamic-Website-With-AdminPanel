@php
$socialmedia=\App\SocialMedia::where('status','Active')->get();
$cms=\App\cms::where('status','Active')->where('module_id',services_module_id)->get();
$author_desc=\App\setting::find(1);
@endphp
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Presento<span>.</span></h3>
           
            <p>
             @php echo $author_desc->address; @endphp <br><br>
              <strong>Phone:</strong> <a href="tel:+91{{$author_desc->first_mobile}}">+91 {{$author_desc->first_mobile}}</a><br>
              <strong>Email:</strong> <a href="mailto:{{$author_desc->first_email}}">{{$author_desc->first_email}}</a><br>
            </p>
           
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              @if(Request::path() == '/')
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                @foreach($quicklink as $result)

                  <li><i class="bx bx-chevron-right"></i> <a href="#{{$result->module->slug}}">{{$result->module->name}}</a></li>    
                @endforeach
              @else
               <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                @foreach($quicklink as $result)

                  <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}#{{$result->module->slug}}">{{$result->module->name}}</a></li>    
                @endforeach
              @endif

              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              @foreach($cms ?? '' as $result)
                @if($result->module_id ==services_module_id)
                <li><i class="bx bx-chevron-right"></i> <a href="{{url($result->name)}}">{{$result->name}}</a></li>
                @endif
              @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            
            <form action="{{route('newsletter_store')}}" class="newsletter" method="post">
              @csrf
              <input type="email" name="email" class="email" aria-invalid="false" >
              <input type="submit" value="Subscribe" >
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>{{$author_desc->author_name}}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
    
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        @if(!$socialmedia->isEmpty())
        @foreach($socialmedia as $result)
         <a href="{{$result->url}}" class="{{$result->title}}"><i class="bx bxl-{{$result->title}}"></i></a>
        @endforeach
        @endif
      </div>
    </div>
  </footer>


