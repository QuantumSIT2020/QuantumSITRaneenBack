@extends('frontend.layouts.master')

@section('title',__('tr.News'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="section-big-py-space blog-page ratio2_3">
    <div class="custom-container">
        <div class="row">
            <div class="col-12">
                
                @if (count($news) > 0)
                @foreach ($news as $blog)

                @php($langName = \Lang::getLocale().'_name')
                @php($langDesc = \Lang::getLocale().'_desc')

                <div class="row blog-media">
                    <div class="col-xl-6 ">
                        <div class="blog-left">
                            <a href="{{ route('frontend_show_news',$blog->id) }}"><img src="{{ asset('backend/dashboard_images/blogs/'.$blog->blog_image) }}" class="img-fluid  " alt="blog"></a>
                            <div class="date-label">
                                {{ $blog->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 ">
                        <div class="blog-right">
                            <div>
                                <a href="{{ route('frontend_show_news',$blog->id) }}">
                                    <h4>{{ $blog->$langName }}</h4>
                                </a>
                                <ul class="post-social">
                                    <li>@lang('tr.Posted By') : {{ $blog->user->name }}</li>
                        
                                </ul>
                                <p>{!! substr($blog->$langDesc,0,250) !!}</p>
                                <a href="{{ route('frontend_show_news',$blog->id) }}" class="read-blog" style="color:#b22827; margin-top: 10px; font-size: 18px; text-decoration: underline;">@lang('tr.Read more')</a>
                            </div>
                        </div>
                    </div>
                </div>

                    
                @endforeach

                <div class="row">
                    {{ $news->links() }}
                </div>

                @else
                <h1 style="text-align: center; font-size: 30px; color: #b22827; font-weight: bold;">@lang('tr.There No News')</h1>
                @endif

                                
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')
@endsection
