@php 
$catagory=\App\catagory::with(['blog_catagory'])->where('status','Active')->get();

$tag=\App\Tag::with(['tag_rel'])->where('status','Active')->get();

$recent_post=\App\Blog::orderBy('created_at','desc')->limit(5)->get();
@endphp
 <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title" >Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{route('search')}}" method="GET">
                  <input type="text" name="search" value="{{$search_val ?? ''}}"  id="search_input" >
                  <button type="submit" id="search"><i class="icofont-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  
                  @if(!$catagory->isEmpty())
                  @foreach($catagory as $result)
                   @if(!$result->blog_catagory->isEmpty())
                   <li><a href="{{route('catagory_detail_show',[$result->catagory])}}">{{$result->catagory}} <span class="catagory_count">({{\App\catagory::CatagoryCount($result->id)}})</span></a></li>
                   @endif
                  @endforeach
                  @endif
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach($recent_post as $result)
                <div class="post-item clearfix">
                  <img src="{{url('public/storage/blogimage/'.$result->image)}}" alt="">
                  <h4><a href="{{route('blog_detail',[Crypt::encrypt($result->id)])}}">{{$result->title}}</a></h4>
                  <time datetime="2020-01-01">{{ date("d-m-Y", strtotime($result->created_at))}}</time>
                </div>

                @endforeach                
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  @if(!$tag->isEmpty())
                    @foreach($tag as $result)
                      @if(!$result->tag_rel->isEmpty())
                       <li><a href="{{route('tag_detail_show',[$result->tag])}}">{{$result->tag}}</a></li>
                      @endif
                    @endforeach
                  @endif
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->
@section('script')

@endsection
