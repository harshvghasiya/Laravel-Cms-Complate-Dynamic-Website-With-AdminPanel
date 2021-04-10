
@extends('front.layout')
@section('title',$search_val)
@section('container')
  <main id="main" class="search_append">
   
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Search</li>
          <li>{{$search_val}}</li>
        </ol>
        <h2>Search</h2>

      </div>
    </section>
    
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
        @if(!$search->isEmpty())
          @foreach($search as $result)
            <article class="entry">

              <div class="entry-img">
                <img src="{{$result->getBlogImageUrl()}}" alt="" class="img-fluid">
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

            </article>

          @endforeach
          
            @else
        <h3 class="text-info">No Data Found For '{{$search_val}}' !!</h3>
        @endif
          </div>

        @include('front.sidebar')

        </div>

      </div>
    </section>

  </main>
  @endsection