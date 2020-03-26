@extends('frontend.layouts.master')

@section('title',__('tr.Single Blogs'))

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="{{ route('frontend_blogs') }}">@lang('tr.Blogs')</a></li>
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
                                   <img src="{{ asset('backend/dashboard_images/blogs/'.$blog->blog_image) }}" class="img-fluid w-100 " alt="{{ $blog->$langName }}">
                                   <h3>{{ $blog->$langName }}</h3>
                                   <ul class="post-social">
                                       <li>{{ $blog->created_at->diffForHumans() }}</li>
                                       <li>@lang('tr.Posted By') : {{ $blog->user->name }}</li>
                                       
                                   </ul>
                                   {!! $blog->$langDesc !!}
                               </div>
                            </div>
                        </div>
                       
                        <div class="row section-big-pb-space">
                            <div class="col-sm-12 ">
                                <div class="creative-card">
                                    <h2>@lang('tr.Comments')</h2>
                                    <ul class="comment-section">
                                       
                                        @foreach ($comments as $comment)
                                        <li>
                                            <div class="media">
                                                <div class="media-body">
                                                    <h6>{{ $comment->name }} <span>( {{ $comment->created_at->diffForHumans() }} )</span></h6>
                                                    <p>{{ $comment->comment }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach

                                        
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class=" row blog-contact">
                            <div class="col-sm-12  ">
                                <div class="creative-card">
                                    <h2>@lang('tr.Leave Your Comment')</h2>
                                    <form class="theme-form" action="{{ route('frontend_comment_blogs',$blog->id) }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label for="name">@lang('tr.Name')</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="email">@lang('tr.Email')</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="exampleFormControlTextarea1">@lang('tr.Comment')</label>
                                                <textarea class="form-control" name="comment" placeholder="Write Your Comment" id="exampleFormControlTextarea1" rows="6" required></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-normal" type="submit">@lang('tr.Post Comment')</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                                
            </div>
        </div>
    </div>
</section>


@endsection
