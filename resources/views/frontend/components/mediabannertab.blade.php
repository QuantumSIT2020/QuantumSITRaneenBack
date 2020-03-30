<!--tab product-->
<section class="section-pb-space" >
    <div class="tab-product-main">
        <div class="tab-prodcut-contain">
            <ul class="tabs tab-title">
                <li class="current"><a href="tab-7">Leatest product</a></li>
                <li class=""><a href="tab-9">best Sellers</a></li>
                <li class=""><a href="tab-10">On Sale</a></li>
            </ul>
        </div>
    </div>
</section>
<!--tab product-->

<!--media banner start-->
<section class="section-pb-space">
    <div class="custom-container">
        <div class="row ">
            <div class="col-12">
                <div class="theme-tab">
                    <div class="tab-content-cls">

                        <div id="tab-7" class="tab-content active default ">
                            <div class="slide-5 no-arrow">
                                <div>
                                    <div class="media-banner b-g-white1 border-0">

                                        @foreach($leatestproduct as $product)
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <img src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" class="img-fluid " style="width:84px;height:108px;" alt="banner">
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        @php($review = \App\Models\Product::getReview($product->id))
                                                        <div>
                                                            @if ($review == 0)
                                                                <div>@lang('tr.Not Rated Yet')</div>
                                                            @else
                                                                <div>
                                                                    @for ($i = 0; $i < $review; $i++)
                                                                        <i class="fa fa-star" style="color:orange"></i>
                                                                    @endfor
                                                                </div>
                                                            @endif
                                                            <p>
                                                                {{$product->en_name}}
                                                            </p>
                                                            <h6>{{$product->price}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>


                        <div id="tab-9" class="tab-content">
                            <div class="slide-5 no-arrow">

                                <div>
                                    <div class="media-banner b-g-white1 border-0">

                                        @foreach($reviews as $review)
                                            {{-- @if($review->review >= 4) --}}

                                            <div class="media-banner-box">
                                            <div class="media">
                                                <img src="{{ asset('backend/dashboard_images/Products/'.$review->product->product_image) }}" class="img-fluid "  style="width:84px;height:108px;" alt="banner">
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <i class="fa fa-star"  style="color:orange;"></i>
                                                            <i class="fa fa-star"  style="color:orange;"></i>
                                                            <i class="fa fa-star"  style="color:orange;"></i>
                                                            <i class="fa fa-star"  style="color:orange;"></i>
                                                            <i class="fa fa-star"  style="color:orange;"></i>
                                                            

                                                            <p>
                                                                {{$review->product->en_name}}
                                                            </p>
                                                            <h6>{{$review->product->price}} </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                           {{-- @endif --}}
                                            @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>




                        <div id="tab-10" class="tab-content">
                            <div class="slide-5 no-arrow">

                                <div>
                                    <div class="media-banner b-g-white1 border-0">
                                        @foreach($discounts as $discount)
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <img src="{{ asset('backend/dashboard_images/Products/'.$discount->products->product_image) }}" class="img-fluid " style="width:84px;height:108px;" alt="banner">
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        @php($review = \App\Models\Product::getReview($discount->products->id))
                                                        <div>
                                                            @if ($review == 0)
                                                                <div>@lang('tr.Not Rated Yet')</div>
                                                            @else
                                                                <div>
                                                                    @for ($i = 0; $i < $review; $i++)
                                                                        <i class="fa fa-star" style="color:orange"></i>
                                                                    @endfor
                                                                </div>
                                                            @endif
                                                            <p>
                                                                {{$discount->products->en_name}}
                                                            </p>
                                                            <h6>EGP {{ $discount->products->price - (($discount->discount / 100) * $discount->products->price) }} / <span>EGP {{ $discount->products->price }}</span></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--media banner end-->