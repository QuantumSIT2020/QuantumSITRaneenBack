<section class="section-py-space ratio_square product">
    <div class="custom-container">
        <div class="row">
            <div class="col pr-0">
                <div class="theme-tab product no-arrow">
                    <div class="tab-content-cls ">
                        @php($langName = \Lang::getLocale().'_name')
                        @foreach ($MainCategories as $main)
                        <div id="tab-{{ $main->id }}" class="tab-content product">
                            <div class="product-slide-6 product-m no-arrow">
                                
                                @foreach ($products as $product)
                                
                                @if ($product->getMainCategory($product->sub_categories_id)->id == $main->id)

                                @php($review = \App\Models\Product::getReview($product->id))
                                @php($getDiscount = \App\Models\Product::checkDiscount($product->id))

                                <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 273px;"><div><div style="width: 100%; display: inline-block;">
                                    <a href="{{ route('frontend_product_details',$product->id) }}" tabindex="0">
                                        </a><div class="product-box"><a href="{{ route('frontend_product_details',$product->id) }}" tabindex="0">
                                            <div class="product-imgbox">
                                                <div class="product-front">
                                                    <img src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" style="width:300px;height:200px;" class="img-fluid  " alt="product">
                                                </div>
                                                <div class="product-back">
                                                    <img src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" style="width:300px;height:200px;" class="img-fluid  " alt="product">
                                                </div>

                                                @if ($product->checkTheLatestDiscountOrHotOffer() != null)

                                                    @if ($product->checkTheLatestDiscountOrHotOffer()->type == 'hotoffer')
                                                    <div class="new-label3">
                                                        @lang('tr.Hot Offer')
                                                    </div>
                                                    @else
                                                    <div class="new-label3">
                                                        @lang('tr.On Sale')
                                                    </div>
                                                    @endif
                                                    
                                                @endif

                                            </div>
                                            </a><div class="product-detail detail-center detail-inverse"><a href="{{ route('frontend_product_details',$product->id) }}" tabindex="0">
                                                </a><div class="detail-title"><a href="{{ route('frontend_product_details',$product->id) }}" tabindex="0">
                                                    </a><div class="detail-left"><a href="{{ route('frontend_product_details',$product->id) }}" tabindex="0">
                                                        @if ($review == 0)
                                                                <div>@lang('tr.Not Rated Yet')</div>
                                                            @else
                                                                <div>
                                                                    @for ($i = 0; $i < $review; $i++)
                                                                        <i class="fa fa-star" style="color:orange"></i>
                                                                    @endfor
                                                                </div>
                                                            @endif
                                                        </a><a href="{{ route('frontend_product_details',$product->id) }}" tabindex="0">
                                                            <h6 class="price-title">
                                                                {{ $product->$langName }}
                                                            </h6>
                                                        </a>
                                                    </div>
                                                    <div class="detail-right">

                                                        @if ($product->checkTheLatestDiscountOrHotOffer() != null)

                                                            @if ($product->checkTheLatestDiscountOrHotOffer()->type == 'hotoffer')
                                                                @php($start = \Carbon\Carbon::parse($product->checkTheLatestDiscountOrHotOffer()->end_date))
                                                                @php($end = \Carbon\Carbon::parse(date('y-m-d')))
                                                                @php($result = $start->diffInDays($end, false))

                                                                @if ($result < 0)
                                                                <div class="check-price">
                                                                    EGP {{ $product->price }}
                                                                </div>
                                                                <div class="price">
                                                                    <div class="price">
                                                                        @php($discount = $product->price - (($product->checkTheLatestDiscountOrHotOffer()->offer / 100) * $product->price))
                                                                        EGP {{ $discount }}
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="price" style="margin-left:0;">
                                                                    EGP {{ $product->price }}
                                                                </div>
                                                                @endif
                                                            @else
                                                            <div class="check-price">
                                                                EGP {{ $product->price }}
                                                            </div>
                                                            <div class="price">
                                                                <div class="price">
                                                                    @php($discount = $product->price - (($product->checkTheLatestDiscountOrHotOffer()->discount / 100) * $product->price))
                                                                    EGP {{ $discount }}
                                                                </div>
                                                            </div>
                                                            @endif
                                                        
                                                        @else
                                                        
                                                        <div class="price" style="margin-left:0;">
                                                            EGP {{ $product->price }}
                                                        </div>

                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                                <div class="icon-detail">
                                                    <button onclick="openCart()" type="button" tabindex="0">
                                                <i class="ti-bag"></i>
                                            </button>
                                                    @if ($product->checkWishList() > 0)
                                                    <button data-product="{{ $product->id }}" class="addToWishList" title="@lang('tr.Remove From Wishlist')">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </button>
                                                    @else
                                                    <button data-product="{{ $product->id }}" class="addToWishList" title="@lang('tr.Add to Wishlist')">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                    </button>
                                                    @endif
                                                    <a href="{{ route('frontend_product_details',$product->id) }}" >
                                                        <i class="ti-search" aria-hidden="true"></i>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div></div></div>
                                    
                                @endif
    
                                @endforeach
                                
                                
                            </div>
                        </div>
                        @endforeach

                        
                        

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
