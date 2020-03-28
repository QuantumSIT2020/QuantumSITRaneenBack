@extends('frontend.layouts.master')

@section('title',__('tr.Hot Offers'))

@section('stylesheet')

@endsection

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="{{ route('frontend_maincategory') }}">@lang('tr.All Products')</a></li>
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

                        <form action="{{ route('frontend_hotofferfilter') }}" method="GET">

                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title mt-0">brand</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    
                                    @php($langName = \Lang::getLocale().'_name')
                                    @foreach ($brands as $brand)
                                        <div class="custom-control custom-checkbox collection-filter-checkbox">
                                            <input type="checkbox" name="brands[]" value="{{ $brand->id }}" class="custom-control-input brandCheck" id="brand_{{ $brand->id }}">
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
                                            <input type="checkbox" name="product_attributes[]" class="custom-control-input" value="{{ $attribute->id }}" id="attribute_{{ $attribute->id }}">
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
                                        <input type="checkbox" name="prices[]" class="custom-control-input" value="10,100" id="price_10100">
                                        <label class="custom-control-label" for="price_10100">@lang('tr.From'): 10&nbsp;&nbsp;@lang('tr.To'):100</label>
                                    </div>

                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" name="prices[]" class="custom-control-input" value="100,500" id="price_10500">
                                        <label class="custom-control-label" for="price_10500">@lang('tr.From'): 100&nbsp;&nbsp;@lang('tr.To'):500</label>
                                    </div>
                                    
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" name="prices[]" class="custom-control-input" value="500,1000" id="price_5001000">
                                        <label class="custom-control-label" for="price_5001000">@lang('tr.From'): 500&nbsp;&nbsp;@lang('tr.To'):1000</label>
                                    </div>
                                    
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" name="prices[]" class="custom-control-input" value=",1000" id="price_above1000">
                                        <label class="custom-control-label" for="price_above1000">@lang('tr.Above'): 1000</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    <button type="submit" class="btn btn-normal" style="display: block;margin-left: auto;margin-right: auto;"><i class="fa fa-search"></i>&nbsp;@lang('tr.Search')</button>
                    </div>

                    

                        </form>

                        
                    <!-- silde-bar colleps block end here -->
                    <!-- side-bar single product slider start -->
                    <div class="theme-card creative-card creative-inner">
                        <h5 class="title-border">@lang('tr.New Products')</h5>
                        <div class="offer-slider slide-1">
                            <div>

                                @foreach ($latestSixProducts as $sixProduct)
                                    @php($getReview = \App\Models\Product::getReview($sixProduct->id))
                                    <div class="media">
                                    <a href=""><img class="img-fluid " src="{{ asset('backend/dashboard_images/Products/'.$sixProduct->product_image) }}" style="width: 185px;height: 134px;" alt=""></a>
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
                                        <div class="row" id="normalData">
                                            
                                            @foreach ($hotOffers as $offer)

                                            @php($getReview = \App\Models\Product::getReview($offer->product->id))

                                            <div class="col-xl-3 col-md-4 col-6 col-grid-box">
                                                <div class="product">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <a href="product-details-bundels.html">
                                                                <div class="product-front">
                                                                    <img style="width: 768px;height: 250px;" src="{{ asset('backend/dashboard_images/Products/'.$offer->product->product_image) }}" class="img-fluid  " alt="product">
                                                                </div>
                                                                <div class="product-back">
                                                                    <img style="width: 768px;height: 250px;" src="{{ asset('backend/dashboard_images/Products/'.$offer->product->product_image) }}" class="img-fluid  " alt="product">
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
                                                                            {{ $offer->product->$langName }}
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                                <div class="detail-right">
                                                                    
                                                                    EGP {{ $offer->product->price }}
                                                                    
                                                                </div>
                                                                <div class="detail-right">
                                                                    @lang('tr.From'):&nbsp;<span style="color: #b22827; font-weight: bold;">{{ $offer->start_date }}</span>&nbsp;&nbsp;@lang('tr.To'):&nbsp;<span style="color: #b22827; font-weight: bold;">{{ $offer->end_date }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="icon-detail">
                                                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                    <i class="ti-bag" ></i>
                                                                </button>
                                                                
                                                                @if ($offer->product->checkWishList() > 0)
                                                                <button data-product="{{ $offer->product->id }}" class="addToWishList" title="@lang('tr.Remove From Wishlist')">
                                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                                </button>
                                                                @else
                                                                <button data-product="{{ $offer->product->id }}" class="addToWishList" title="@lang('tr.Add to Wishlist')">
                                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                                </button>
                                                                @endif

                                                                
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

@section('javascript')




<script>
   $(document).on('input', '.priceRange', function() {
    $('.selectRanage').html($('.priceRange').val()+' EGP');
});

$(document).ready(function(){
    var addToWishListUrl = '{{ route("frontend_addwishlist",["id"=>"#id"]) }}';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    $('.addToWishList').on('click',function(e){
        e.preventDefault();
        
        addToWishListUrl = addToWishListUrl.replace('#id',$(this).data('product'));
        jQuery.ajax({
            url: addToWishListUrl,
            method: 'get',
        success: function(result){
            if (result.added == "added") {
                Command: toastr["success"]('@lang("tr.Add To Wishlist")', "@lang('tr.Done')")
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "300",
                    "timeOut": "300",
                    "extendedTimeOut": "300",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                
                $('.addToWishList').html('<i class="fa fa-heart" aria-hidden="true"></i>');
                $('.addToWishList').attr('title','@lang("tr.Remove From Wishlist")');
                $('#wishVal').html(parseInt($('#wishVal').text()) + 1);
                

            }if (result.deleted == "deleted") {
                Command: toastr["warning"]('@lang("tr.Remove From Wishlist")', "@lang('tr.Done')")
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "300",
                    "timeOut": "300",
                    "extendedTimeOut": "300",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }


                $('.addToWishList').html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
                $('.addToWishList').attr('title','@lang("tr.Add To Wishlist")');
                
                if($('#wishVal').text() != 0){
                    $('#wishVal').html(parseInt($('#wishVal').text()) - 1);
                }
            }
        }});
    });



    
});
    
</script>
    {{-- @include('frontend.components.scripts.filterproduct') --}}
@endsection
