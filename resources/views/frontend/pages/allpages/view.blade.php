@extends('frontend.layouts.master')

@section('title',$viewpages->name)

@section('content')

@section('breads')
    <li><i class="fa fa-angle-double-right"></i></li>
    <li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')
<!--End header start-->
<!--with slider start-->
<section class="section-big-py-space blog-page ratio2_3">
    <div class="custom-container">
        <div class="row">
            @if($viewpages->page_image != null)
                <div class="col-lg-6">
                    <div class="banner-section"><img src="{{ URL::to('/') }}/backend/dashboard_images/pages/{{$viewpages->page_image }}" class="img-fluid   w-100" alt="" style="height: 360px !important;"></div>
                </div>
                <div class="col-lg-6">
                    <h4> {{$viewpages->name}} </h4>
                    <p class="mb-2">{!! $viewpages->description !!}</p>
                </div>
            @else
                <div class="col-12">
                    <h3> {{$viewpages->name}} </h3>
                    <p class="mb-2">{!! $viewpages->description !!}</p>
                </div>
            @endif


    </div>
    </div>
</section>

<!--with slider end-->






@endsection