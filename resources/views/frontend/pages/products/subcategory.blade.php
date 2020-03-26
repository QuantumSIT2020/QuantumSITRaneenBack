@extends('frontend.layouts.master')

@section('title',__('tr.Products'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="section-big-pt-space ratio_asos bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-3 collection-filter category-page-side">
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block creative-card creative-inner category-side">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title mt-0">brand</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    
                                    @php($langName = \Lang::getLocale().'_name')
                                    @foreach ($brands as $brand)
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand_{{ $brand->id }}">
                                            <label class="custom-control-label" for="brand_{{ $brand->id }}">{{ $brand->$langName }}</label>
                                        </div>
                                    @endforeach
                                    

                                    
                                </div>
                            </div>
                        </div>
                        
                        @foreach ($attibuteGroups as $group)
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title mt-0">{{ $group->$langName }}</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach ($attributes as $attribute)
                                        @if ($group->id == $attribute->attribute_group_id)

                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="attribute_{{ $attribute->id }}">
                                            <label class="custom-control-label" for="attribute_{{ $attribute->id }}">{{ $attribute->$langName }}</label>
                                        </div>
                                            
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                        
                        <!-- price filter start here -->
                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">price</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="hundred">
                                        <label class="custom-control-label" for="hundred">10 EGP - 100 EGP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="twohundred">
                                        <label class="custom-control-label" for="twohundred">100 EGP - 200 EGP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="threehundred">
                                        <label class="custom-control-label" for="threehundred">200 EGP - 300 EGP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="fourhundred">
                                        <label class="custom-control-label" for="fourhundred">300 EGP - 400 EGP</label>
                                    </div>
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="fourhundredabove">
                                        <label class="custom-control-label" for="fourhundredabove">400 EGP @lang('tr.above')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- silde-bar colleps block end here -->
                    <!-- side-bar single product slider start -->
                    <div class="theme-card creative-card creative-inner">
                        <h5 class="title-border">@lang('tr.New Products')</h5>
                        <div class="offer-slider slide-1">
                            <div>

                                @foreach ($latestSixProducts as $sixProduct)
                                    @php($getReview = \App\Models\Product::getReview($sixProduct->id))
                                    <div class="media">
                                    <a href=""><img class="img-fluid " src="{{ asset('backend/dashboard_images/Products/'.$sixProduct->product_image) }}" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div>
                                            @for ($i = 0; $i < round( $getReview); $i++)
                                            <i class="fa fa-star" style="color:orange"></i>
                                            @endfor
                                            ({{ round( $getReview).'/5' }})
                                            
                                        </div><a href="product-page(no-sidebar).html"><h6>{{ $sixProduct->$langName }}</h6></a>
                                        <h4>{{ $sixProduct->price.' EGP' }}</h4></div>
                                    </div>
                                @endforeach
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- side-bar single product slider end -->
                    <!-- side-bar banner start here -->
                    
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Showing Products 1-24 of 10 Result</h5>
                                                    </div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="{{ asset('frontend/assets/images/category/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="{{ asset('frontend/assets/images/category/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="{{ asset('frontend/assets/images/category/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="{{ asset('frontend/assets/images/category/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-per-view">
                                                        <select>
                                                        <option value="High to low">24 Products Par Page</option>
                                                        <option value="Low to High">50 Products Par Page</option>
                                                        <option value="Low to High">100 Products Par Page</option>
                                                    </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select>
                                                        <option value="High to low">Sorting items</option>
                                                        <option value="Low to High">50 Products</option>
                                                        <option value="Low to High">100 Products</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid product-load-more">
                                        <div class="row">
                                            
                                            @foreach ($products as $product)

                                            @php($getReview = \App\Models\Product::getReview($product->id))
                                            @php($getDiscount = \App\Models\Product::checkDiscount($product->id))

                                            <div class="col-xl-3 col-md-4 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <a href="product-details-bundels.html">
                                                                <div class="product-front">
                                                                    <img style="width: 768px;height: 250px;" src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" class="img-fluid  " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="width: 768px;height: 250px;" src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" class="img-fluid  " alt="product">
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="product-detail detail-center ">
                                                            <div class="detail-title">
                                                                <div class="detail-left">
                                                                    <div>
                                                                        @for ($i = 0; $i < round( $getReview); $i++)
                                                                        <i class="fa fa-star" style="color:orange"></i>
                                                                        @endfor
                                                                        ({{ round( $getReview).'/5' }})
                                                                        
                                                                    </div>
                                                                    <a href="">
                                                                        <h6 class="price-title">
                                                                            {{ $product->$langName }}
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                                <div class="detail-right">
                                                                    
                                                                    @if ($getDiscount == null)
                                                                    <div class="price" style="margin-left:0;">
                                                                        EGP {{ $product->price }}
                                                                    </div>
                                                                    @else
                                                                    <div class="check-price">
                                                                        EGP {{ $product->price }}
                                                                    </div>
                                                                    <div class="price">
                                                                        <div class="price">
                                                                            @php($discount = $product->price - (($getDiscount->discount / 100) * $product->price))
                                                                            EGP {{ $discount }}
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="icon-detail">
                                                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                    <i class="ti-bag" ></i>
                                                                </button>
                                                                <a href="javascript:void(0)" title="Add to Wishlist">
                                                                    <i class="ti-heart" aria-hidden="true"></i>
                                                                </a>
                                                                <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                    <i class="ti-search" aria-hidden="true"></i>
                                                                </a>
                                                                <a href="compare.html" title="Compare">
                                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            @endforeach

                                            
                                            
                                        </div>
                                    </div>
                                    <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore">load more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection
