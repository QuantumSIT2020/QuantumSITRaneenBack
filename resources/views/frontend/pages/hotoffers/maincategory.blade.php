@extends('frontend.layouts.master')

@section('title',__('tr.Main Category'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')


<section class="collection-banner section-pb-space" style="background-color: #fff !important;">
    <div class="container-fluid">
        <div class="row collection2">
            
            @foreach ($mains as $main)
            @foreach ($hotOffers as $offer)
            
                @if ($offer->product->getMainCategory($offer->product->SubCategory->id)->id == $main->id)

                <div class="col-md-4" style="margin-bottom: 10px;">
                    <div class="collection-banner-main banner-1">
                        <div class="collection-img">
                            <img src="{{ asset('backend/dashboard_images/MainCategory/'.$main->main_image) }}" class="img-fluid bg-img  " alt="banner">
                            <div class="overlayout"></div>
                        </div>
                        <div class="collection-banner-contain">
                            <div>
                                {{-- get Count of childs of main category --}}
                                @php($childsCount = \App\Models\MainCategory::countChilds($main->id)) 
                                @php($langName = \Lang::getLocale().'_name')
                                <h3>({{ $childsCount }} @lang('tr.Child Category'))</h3>
                                <h4>{{ $main->$langName }}</h4>
                                <div class="shop">
                                    <a href="{{ route('frontend_products_childcategory',$main->id) }}">
                                    @lang('tr.Shop Now')
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endif
            @endforeach
            
            
                
            @endforeach

            
            
        </div>
        
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection