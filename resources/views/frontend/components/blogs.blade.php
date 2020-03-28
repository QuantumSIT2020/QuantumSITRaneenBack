<section class="blog pa-blog ">
    <!--title start-->
    <div class="title3">
        <h4>@lang('tr.Latest Blog')</h4>
    </div>
    <!--title end-->
    <div class="container">
        <div class="row">
            <div class="col pr-0">
                <div class="blog-slide no-arrow">
                    @php($langName = \Lang::getLocale().'_name')
                    @php($langDesc = \Lang::getLocale().'_desc')

                    @if (count($lastfourBlogs) > 0)

                    @foreach ($lastfourBlogs as $blog)

                    <div>
                        <div class="blog-contain">
                            <div class="blog-img">
                                <img src="{{ asset('backend/dashboard_images/blogs/'.$blog->blog_image) }}" style="width:370px;height:270px;" alt="blog" class="img-fluid  w-100">
                            </div>
                            <div class="blog-details">
                                <h4>{{ $blog->$langName }}</h4>
                                <p>{!! substr($blog->$langDesc,0,30) !!}</p>
                                <span><a href="{{ route('frontend_show_blogs',$blog->id) }}">@lang('tr.read more')</a></span>
                            </div>
                            <div class="blog-label">
                                <p>{{ $blog->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
                    
                    @else

                    <h4 style="text-align:center">@lang('tr.There Are No Blogs')</h4>

                    @endif

                    

                    
                </div>
            </div>
        </div>
    </div>
</section>