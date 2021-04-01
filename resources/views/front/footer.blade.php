 @php
$author_desc=\App\setting::find(1);
$socialmedia=\App\SocialMedia::where('status','Active')->get();

@endphp
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Presento<span>.</span></h3>
           
            <p>
             @php echo $author_desc->address; @endphp <br><br>
              <strong>Phone:</strong> +91 {{$author_desc->first_mobile}}<br>
              <strong>Email:</strong> {{$author_desc->first_email}}<br>
            </p>
           
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
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
          &copy; Copyright <strong><span>Harsh Vaghasiya</span></strong>. All Rights Reserved
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
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $(".newsletter").validate({
        rules: { 
           email: { required: true,email:true },
        },
        messages:{
           email: { required: 'Please enter email',email:'Please enter valid Email' },
        },
        highlight: function (element) {
                $(element).parent().addClass('text-danger')
            },
        unhighlight: function (element) {
                $(element).parent().removeClass('text-danger')
            }

    });
});
</script>
@endsection
