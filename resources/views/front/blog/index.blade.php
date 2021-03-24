@php
$author_desc=\App\setting::find(1);  
@endphp
@extends('front.layout')
@section('title','Blog')
@section('container')
  <main id="main" class="search_append">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

          @foreach($all ?? '' as $result)
            <article class="entry">

              <div class="entry-img">
                <img src="{{url('public/storage/blogimage/'.$result->image)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$result->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{$author_desc->author_name}}</a></li>
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
          
     
     
            <div class="blog-pagination">
                   @if ($all->hasPages())
    <ul class="justify-content-center paginate">
        {{-- Previous Page Link --}}
        @if ($all->onFirstPage())
            <li class="disabled"><i class="icofont-rounded-left"></i></li>
        @else
            <li><a href="{{ $all->previousPageUrl() }}" rel="prev"><i class="icofont-rounded-left"></i></a></li>
        @endif

        @if($all->currentPage() > 3)
            <li class="hidden-xs"><a href="{{ $all->url(1) }}">1</a></li>
        @endif
        @if($all->currentPage() > 4)
            <li><span>...</span></li>
        @endif
        @foreach(range(1, $all->lastPage()) as $i)
            @if($i >= $all->currentPage() - 2 && $i <= $all->currentPage() + 2)
                @if ($i == $all->currentPage())
                    <li class="active"><a href="javascript:void()" >{{ $i }}</a></li>
                @else
                    <li><a href="{{ $all->url($i) }}" class="page">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($all->currentPage() < $all->lastPage() - 3)
            <li><span>...</span></li>
        @endif
        @if($all->currentPage() < $all->lastPage() - 2)
            <li class="hidden-xs"><a href="{{ $all->url($all->lastPage()) }}">{{ $all->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($all->hasMorePages())
            <li><a href="{{ $all->nextPageUrl() }}" rel="next"><i class="icofont-rounded-right"></i></a></a></li>
        @else
            <li class="disabled"><i class="icofont-rounded-right"></i></li>
        @endif
    </ul>
@endif

              {{-- <ul class="justify-content-center">
                <li class="disabled"><a href="{{ $all->previousPageUrl() }}"><i class="icofont-rounded-left"></i></a></li>
                <li><a href="">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
              </ul> --}}
            </div>

          </div><!-- End blog entries list -->

        @include('front.sidebar')

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  @endsection
@section('script')


@endsection