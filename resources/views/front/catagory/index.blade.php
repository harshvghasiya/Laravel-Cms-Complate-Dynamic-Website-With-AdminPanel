
@extends('front.layout')
@section('title',$catagory.'  Category')
@section('container')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Catagory</li>
          <li>{{$catagory}}</li>
        </ol>
        <h2>Catagory</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

          @foreach($catagory_blog as $blog)
             @foreach($blog as $result)
            <article class="entry">

              <div class="entry-img">
                <img src="{{url('public/storage/blogimage/'.$result->image)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$result->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ date("d-m-Y", strtotime($result->created_at))}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  @php echo substr($result->description,0,600); @endphp
                </p>
                <div class="read-more">
                  <a href="{{route('blog_detail',[Crypt::encrypt($result->id)])}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            @endforeach
          @endforeach
          
     

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="disabled"><i class="icofont-rounded-left"></i></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

        @include('front.sidebar')

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  @endsection