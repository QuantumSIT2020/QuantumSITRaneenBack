<section class="section-pb-space ">
    <div class="custom-container">
        <div class="row layout-3-hotdeal">
            @php($langName = \Lang::getLocale().'_name')
            @php($langDesc = \Lang::getLocale().'_desc')
            
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="media-banner banner-inverse b-g-white1 border-0">
                    <div class="media-banner-box">
                        <div class="media-heading">
                            <h5>@lang('tr.on sale')</h5>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="co-lg-6 col-md-6 col-sm-6">
                            
                            @foreach ($lasttwoDiscount as $lasttwo)
                            <div class="media-banner-box">
                                <div class="media">
                                    <img src="{{ asset('backend/dashboard_images/Products/'.$lasttwo->products->product_image) }}" style="width:84px;height:108px;" class="img-fluid  " alt="banner">
                                    <div class="media-body">
                                        <div class="media-contant">
                                            @php($review = \App\Models\Product::getReview($lasttwo->products->id))
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
                                                    {{ $lasttwo->products->$langName }}
                                                </p>
                                                
                                                <h6>EGP {{ $lasttwo->products->price - (($lasttwo->discount / 100) * $lasttwo->products->price) }} / <span>EGP {{ $lasttwo->products->price }}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
        
                        <div class="co-lg-6 col-md-6 col-sm-6">
                            @php($langName = \Lang::getLocale().'_name')
                            @foreach ($lastAftertwoDiscount as $lastaftertwo)
                            <div class="media-banner-box">
                                <div class="media">
                                    <img src="{{ asset('backend/dashboard_images/Products/'.$lastaftertwo->products->product_image) }}" style="width:84px;height:108px;" class="img-fluid  " alt="banner">
                                    <div class="media-body">
                                        <div class="media-contant">
                                            @php($review = \App\Models\Product::getReview($lastaftertwo->products->id))
                                            <div>
                                                @if ($review == 0)
                                                <div>@lang('tr.Not Rated Yet')</div>
                                                @else
                                                <div>
                                                    @for ($i = 0; $i < $review; $i++)
                                                    <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                                @endif
                                                <p>
                                                    {{ $lastaftertwo->products->$langName }}
                                                </p>
                                                
                                                <h6>EGP {{ $lastaftertwo->products->price - (($lastaftertwo->discount / 100) * $lastaftertwo->products->price) }} / <span>EGP {{ $lastaftertwo->products->price }}</span></h6>
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







            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="hot-deal">
                    <div class="slide-1">
                        
                        @foreach ($lasttwoHotOffer as $lasttwo)
                        
                        <div>
                            <div class="hot-deal-contain1 border-0">
                                <div class="hot-deal-heading">
                                    <h5>@lang('tr.Last Hot Deal')</h5>
                                </div>
                                <div class="row hot-deal-subcontain">
                                    <div class="col-lg-4 col-sm-3 ">
                                        <div class="hotdeal-right-slick-1 no-arrow">
                                            <div class="right-slick-img"><img style="width:205px;height:263px;" src="{{ asset('backend/dashboard_images/Products/'.$lasttwo->product->product_image) }}" alt="hot-deal" class="img-fluid  "></div>
                                            @foreach ($lasttwo->product->getGalleryImages() as $image)
                                                <div class="right-slick-img"><img style="width:205px;height:263px;" src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}" alt="hot-deal" class="img-fluid  "></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-7">
                                        <div class="hot-deal-center">
                                            @php($getRemainTime = \App\Models\Product::calculateRemainTime($lasttwo->start_date,$lasttwo->end_date))
                                            
                                            <div>
                                                <div class="timer">
                                                    <p id="demo">
                                                        <span>
                                                   {{ $getRemainTime[0] }}
                                                   <span>@lang('tr.days')</span>
                                                        </span>
                                                        <span>:</span>
                                                        <span>
                                                    {{ $getRemainTime[1] }}
                                                    <span>@lang('tr.hrs')</span>
                                                        </span>
                                                        <span>:</span>
                                                        <span>
                                                    {{ $getRemainTime[2] }}
                                                    <span>@lang('tr.min')</span>
                                                        </span>
                                                        <span>:</span>
                                                        <span>
                                                    {{ $getRemainTime[3] }}
                                                    <span>@lang('tr.sec')</span>
                                                        </span>
                                                    </p>
                                                </div>
                                                
                                                @if ($review == 0)
                                                <div>@lang('tr.Not Rated Yet')</div>
                                                @else
                                                <div>
                                                    @for ($i = 0; $i < $review; $i++)
                                                    <i class="fa fa-star" style="color:orange"></i>
                                                    @endfor
                                                </div>
                                                @endif

                                                <div>
                                                    <h5>{{ $lasttwo->product->$langName }}</h5>
                                                </div>
                                                <div>
                                                    <p>
                                                        {!! substr($lasttwo->product->$langDesc,0,89) !!}
                                                    </p>
                                                    <div class="price">
                                                        <span>EGP {{ $lasttwo->product->price - (($lasttwo->offer / 100) * $lasttwo->product->price) }}</span>
                                                        <span>EGP {{ $lasttwo->product->price }}</span>
                                                        <a href="product-details-bundels.html" class="details-o"> details</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2  col-sm-2">
                                        <div class="hotdeal-right-nav-1">
                                            <div class="right-slick-img"><img style="width:63px;height:81px;" src="{{ asset('backend/dashboard_images/Products/'.$lasttwo->product->product_image) }}" alt="hot-deal" class="img-fluid  "></div>
                                            @foreach ($lasttwo->product->getGalleryImages() as $image)
                                                <div class="right-slick-img"><img style="width:63px;height:81px;" src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}" alt="hot-deal" class="img-fluid  "></div>
                                            @endforeach
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
</section>