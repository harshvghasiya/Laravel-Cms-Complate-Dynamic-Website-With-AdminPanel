
@extends('front.layout')
@section('title',$all->title)
@section('container')
  <main id="main" class="search_append">
{{-- {{dd($all)}} --}}
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{url('')}}">Home</a></li>
          <li><a href="{{url('blog')}}">Blog</a></li>
          <li>Post</li>
        </ol>
        <h2>Blog </h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{url('public/storage/blogimage/'.$all->image)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
               {{$all->title}}
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{$author_desc->author_name}}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ date("d-m-Y", strtotime($all->created_at))}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
               
              @php echo $all->description; @endphp
              

              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li>
                     @php $x=\App\catagory::getPostCatagory($all->id) @endphp
                      @foreach($x as $result)
                      <a href="{{route('catagory_detail_show',[$result])}}">
                      {{$result}}</a>,

                      @endforeach

                       
                      </li>
                  </ul>
                 {{--  @if(!$tag->isEmpty())
                  <i class="icofont-tags"></i>
                  <ul class="tags">
                    
                    @foreach($tag as $result)
                     <li><a href="{{route('tag_detail_show',[$result->tag])}}">{{$result->tag}}</a></li>
                    @endforeach
                    
                  </ul>
                  @endif --}}
                </div>

                <div class="float-right share">
                  
                </div>

              </div>

            </article><!-- End blog entry -->

            <div class="blog-author clearfix">
              <img src="{{url('public/storage/authorimage/'.$author_desc->image)}}" width="120px" height="120px" class="rounded-circle float-left" alt="">
              <h4>{{$author_desc->author_name}}</h4>
              <div class="social-links">
                @if(!$social_media->isEmpty())
                   @foreach($social_media as $result)
                  <a href="{{$result->url}}" title="Share on {{$result->title}}"><i class="icofont-{{$result->title}}"></i></a>
                @endforeach
                @endif
              </div>
              <p>
               <?php echo $author_desc->author_decription_sidebar; ?>
              </p>
            </div><!-- End blog author bio -->

       
          </div><!-- End blog entries list -->
          @include('front.sidebar')
        
         
        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->