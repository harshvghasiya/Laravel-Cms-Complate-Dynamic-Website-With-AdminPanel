
@extends('front.layout')
@section('title',$tag.'  Tag')
@section('container')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Tag</li>
          <li>{{$tag}}</li>
        </ol>
        <h2>Tag</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

          @foreach($tag_blog as $result)
             @foreach($result->tag_rel as $blog)
             @if($blog->status == 'Active')
            <article class="entry">

              <div class="entry-img">
                <img src="{{$blog->getBlogImageUrl()}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$blog->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
              {{--     <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">John Doe</a></li> --}}
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ date("d-m-Y", strtotime($blog->created_at))}}</time></a></li>

                </ul>
              </div>

              <div class="entry-content">
                <p>
                  @php echo substr($blog->description,0,600); @endphp
                </p>
                <div class="read-more">
                  <a href="{{route('blog_detail',[Crypt::encrypt($blog->id)])}}">Read More</a>
                </div>
              </div>

            </article>
             @endif
            @endforeach
          @endforeach


          </div><!-- End blog entries list -->

        @include('front.sidebar')

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  @endsection