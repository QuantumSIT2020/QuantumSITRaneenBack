@extends('frontend.layouts.master')

@section('title',__('tr.Bundles'))

@section('content')

@section('breads')
    <li><i class="fa fa-angle-double-right"></i></li>
    <li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')


<section class="collection-banner section-pb-space" style="background-color: #fff !important;">
    <div class="container-fluid">
        <div class="row collection2">

              @foreach ($bundles as $bundle)

                <div class="col-md-4" style="margin-bottom: 10px;">
                    <div class="collection-banner-main banner-1">
                        <div class="collection-img">

                            <img src="{{ asset('backend/dashboard_images/products/'.$bundle->getMainImage()->product_image) }}" class="img-fluid bg-img  " alt="banner">
                            <div class="overlayout"></div>
                        </div>
                        <div class="collection-banner-contain">
                            <div>

                             @php($langName = \Lang::getLocale().'_name')

                                <h4>{{ $bundle->$langName }}</h4>
                                <div class="shop">
                                    <a  style="display: block;  width: 122px;margin-left: auto; margin-right: auto;" href="{{ route('frontend_bundledetails',$bundle->id) }}">
                                        @lang('tr.Shop Now')
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               @endforeach


        </div>
        </div>

    </div>
</section>

@include('frontend.components.contactbanner')

@endsection