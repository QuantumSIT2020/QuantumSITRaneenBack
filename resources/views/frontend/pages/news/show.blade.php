@extends('frontend.layouts.master')

@section('title',__('tr.Single News'))

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="{{ route('frontend_news') }}">@lang('tr.News')</a></li>
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@section('content')

@include('frontend.components.breadcrumb')

<section class="section-big-py-space blog-page ratio2_3">
    <div class="custom-container">
        <div class="row">
            <div class="col-12">
                @php($langName = \Lang::getLocale().'_name')
                @php($langDesc = \Lang::getLocale().'_desc')
                <section class="blog-detail-page section-big-py-space ratio2_3">
                    <div class="container">
                        <div class="row section-big-pb-space">
                            <div class="col-sm-12 blog-detail">
                               <div class="creative-card">
                                   <img src="{{ asset('backend/dashboard_images/blogs/'.$news->blog_image) }}" class="img-fluid w-100 " alt="{{ $news->$langName }}">
                                   <h3>{{ $news->$langName }}</h3>
                                   <ul class="post-social">
                                       <li>{{ $news->created_at->diffForHumans() }}</li>
                                       <li>@lang('tr.Posted By') : {{ $news->user->name }}</li>
                                       
                                   </ul>
                                   {!! $news->$langDesc !!}
                               </div>
                            </div>
                        </div>
                       
                       </div>
                </section>

                                
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')


@endsection
