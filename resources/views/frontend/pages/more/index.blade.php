@extends('frontend.layouts.master')

@section('title',$pages->name)

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
                <section class="blog-detail-page section-big-py-space ratio2_3">
                    <div class="row section-big-pb-space">
                        <div class="col-sm-12 blog-detail">
                           <div class="creative-card">
                               @if ($pages->page_image != null)

                               <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ URL::to('/') }}/backend/dashboard_images/pages/{{$pages->page_image }}" class="img-fluid w-100 " alt="{{ $pages->name }}">
                               </div>
                               
                               <div class="col-lg-6">
                                    <h3>{{ $pages->name }}</h3>
                                    <hr>
                                    {!! $pages->description !!}
                               </div>
                               </div>
                               
                               @else

                                <div class="col-lg-12">
                                    <h3>{{ $pages->name }}</h3>
                                    <hr>
                                    {!! $pages->description !!}
                                </div>

                               @endif
                               
                               
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