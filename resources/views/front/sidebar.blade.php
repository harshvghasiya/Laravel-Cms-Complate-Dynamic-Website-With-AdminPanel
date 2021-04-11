@php 
$catagory=\App\catagory::whereHas('blog_catagory',function($q)
{
  $q->where('status','Active');
})->get();

$tag=\App\Tag::whereHas('tag_rel', function($q){ 
  $q->where('status','Active');
})->get();

$recent_post=\App\Blog::where('status','Active')->orderBy('created_at','desc')->limit(5)->get();
@endphp
 <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title" >Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{route('search')}}" method="GET">
                  <input type="text" name="search" value="{{$search_val ?? ''}}"  id="search_input" >
                  <button type="submit" id="search"><i class="icofont-search"></i></button>
                </form>
              </div>

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul> 
                  @if(!$catagory->isEmpty())

                  @foreach($catagory as $result)                  
                    <li><a href="{{route('catagory_detail_show',[$result->catagory])}}">{{$result->catagory}} <span class="catagory_count">({{\App\catagory::CatagoryCount($result->id)}})</span></a></li>                  
                  @endforeach
                  @endif
                </ul>
              </div>

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach($recent_post as $result)
                <div class="post-item clearfix">
                  <img src="{{ $result->getBlogImageUrl()}}" alt="">
                  <h4><a href="{{route('blog_detail',[Crypt::encrypt($result->id)])}}">{{$result->title}}</a></h4>
                  <time datetime="2020-01-01">{{ date("d-m-Y", strtotime($result->created_at))}}</time>
                </div>

                @endforeach                
              </div>

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  @if(!$tag->isEmpty())
                    @foreach($tag as $result)
                      <li><a href="{{route('tag_detail_show',[$result->tag])}}">{{$result->tag}}</a></li> 
                    @endforeach
                  @else
                  <h3>No Active Tag!!</h3>
                  @endif
                </ul>
              </div>

            </div>

          </div>
@section('script')

@endsection
