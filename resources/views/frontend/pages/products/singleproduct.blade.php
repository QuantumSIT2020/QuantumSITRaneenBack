@extends('frontend.layouts.master')

@php($langName = \Lang::getLocale().'_name')

@section('title',$product->$langName)


@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="section-big-pt-space bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="product-slick no-arrow">
                        <div><img src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                        @foreach ($gallery as $image)
                            <div><img src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}"  alt="" class="img-fluid  image_zoom_cls-1"></div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                <div><img src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                                @foreach ($gallery as $image)
                                <div><img src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}"  alt="" class="img-fluid  image_zoom_cls-1"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 rtl-text">
                    <div class="product-right">
                        <h2>{{ $product->$langName }}</h2>
                        @php($getDiscount = \App\Models\Product::checkDiscount($product->id))
                        @if ($getDiscount == null)
                        <h3>EGP {{ $product->price }}</h3>
                        @else
                        <h4><del>EGP {{ $product->price }}</del><span>{{ $getDiscount->discount }} @lang('tr.off')</span></h4>
                        @php($discount = $product->price - (($getDiscount->discount / 100) * $product->price))
                        <h3>EGP {{ $discount }}</h3>
                        @endif
                        
                        
                        <div class="product-description border-product">
                            <span style="float:right;">
                                @if ($product->checkWishList() > 0)
                                <button data-product="{{ $product->id }}" class="addToWishList" title="@lang('tr.Remove From Wishlist')">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                                @else
                                <button data-product="{{ $product->id }}" class="addToWishList" title="@lang('tr.Add to Wishlist')">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                                @endif
                            </span>
                            @foreach ($attibuteGroups as $group)
                                
                                @foreach ($attributes as $attribute)

                                    @if ($attribute->attribute->attribute_group_id == $group->id)

                                    <h6 class="product-title size-text">{{ $group->$langName }}</h6>
                                    <br>
                                    <ul>
                                        <li>
                                            <input type="checkbox" name="" id="{{ $attribute->id}}">
                                            <label for="{{ $attribute->id}}">{{ $attribute->attribute->$langName }}</label>
                                        </li>

                                    </ul>
                                        
                                    @endif

                                    
                                @endforeach
                            
                            @endforeach

                            

                            
                            <h6 class="product-title">@lang('tr.Quantity')</h6>
                            <div class="qty-box">
                                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                    <input type="text" name="quantity" max="{{ $product->quantity }}" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                            </div>
                        </div>
                        <div class="product-buttons"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">buy now</a></div>
                        <div class="border-product">
                            <h6 class="product-title">@lang('tr.Product Details')</h6>
                            <p>{!! $product->description !!}</p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('frontend.components.contactbanner')

@endsection

@section('javascript')

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e817cf1047b80c5"></script>


@endsection
