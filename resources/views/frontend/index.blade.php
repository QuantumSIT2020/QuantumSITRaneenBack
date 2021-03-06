@extends('frontend.layouts.master')

@section('title',__('tr.Raneen'))

@section('allcategories')
    @include('frontend.components.allcategory')
@endsection

@section('content')

@include('frontend.components.slider')

@include('frontend.components.collectionbanner')

@include('frontend.components.topbrand')

@include('frontend.components.services')

@include('frontend.components.hotdeal')

<!--tab product-->
@include('frontend.components.tabproduct')
<!--End tab product-->

<!--product tab-->
@include('frontend.components.producttab')
<!--End product tab-->

<!--product tab-->
{{-- @include('frontend.components.collectionbanner2') --}}
<!--End product tab-->


<!--dealbanner-->
@include('frontend.components.dealbanner')
<!--End dealbanner-->

<!--media banner tab start-->
{{-- @include('frontend.components.mediabannertab') --}}
<!--End media banner tab start-->

<!--blogs-->
@include('frontend.components.blogs')
<!--End blogs-->

<!--masonarybanner-->
@include('frontend.components.masonarybanner')
<!--End masonarybanner-->

<!--testimonial-->
@include('frontend.components.testimonial')
<!--End testimonial-->

<!--newsletter-->
@include('frontend.components.newsletter')
<!--End newsletter-->

<!--contact banner-->
@include('frontend.components.contactbanner')
    <!--End contact banner-->



<!--news letter modal-->
@include('frontend.components.newslettermodal')
<!--End news letter modal-->

<!--quick view modal-->
@include('frontend.components.quickviewmodal')
<!--End quick view modal-->

<!--my account-->
@include('frontend.components.myaccount')
<!--End my account-->

<!--add wishlist-->
@include('frontend.components.addwishlist')
<!--End add wishlist-->

<!--add settingbar-->
@include('frontend.components.addsettingbar')
<!--End add settingbar-->



<!--slider start-->
    
@endsection