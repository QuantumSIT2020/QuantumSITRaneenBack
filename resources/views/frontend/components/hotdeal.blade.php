@php($langName = \Lang::getLocale().'_name')
@php($langDesc = \Lang::getLocale().'_desc')

<!--media banner start-->
<section class=" b-g-white section-big-pt-space">
    <div class="container">
        <div class="row hot-1">
            <div class="col-lg-3 col-sm-6  col-12  ">
                <div class="slide-1   no-arrow">
                    <div>
                        <div class="media-banner">
                            <div class="media-banner-box">
                                <div class="media-heading">
                                    <h5>@lang('tr.On Sale')</h5>
                                </div>
                            </div>

                            @foreach ($lasttwoDiscount as $two)
                            @php($reviews = \App\Models\Product::getReview($two->products->id))
                            <div class="media-banner-box">
                                <div class="media">
                                    <img src="{{ asset('backend/dashboard_images/Products/'.$two->products->product_image) }}" class="img-fluid  " alt="banner">
                                    <div class="media-body">
                                        <div class="media-contant">
                                            <div>
                                                @if ($reviews == 0)
                                                <div>@lang('tr.Not Rated Yet')</div>
                                                @else
                                                <div>
                                                    @for ($i = 0; $i < $reviews; $i++)
                                                    <i class="fa fa-star" style="color:orange"></i>
                                                    @endfor
                                                </div>
                                                @endif
                                                <p>
                                                    {{ $two->products->$langName }}
                                                </p>
                                                <h6>EGP {{ $two->products->price - (($two->discount / 100) * $two->products->price) }} / <span>EGP {{ $two->products->price }}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach


                            <div class="media-banner-box">
                                <div class="media-view">
                                    <h5><a href="{{ route('frontend_discounts') }}">@lang('tr.View More')</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="media-banner">
                            <div class="media-banner-box">
                                <div class="media-heading">
                                    <h5>@lang('tr.On Sale')</h5>
                                </div>
                            </div>

                            @foreach ($lastAftertwoDiscount as $lasttwo)
                            @php($reviews = \App\Models\Product::getReview($lasttwo->products->id))
                            <div class="media-banner-box">
                                <div class="media">
                                    <img src="{{ asset('backend/dashboard_images/Products/'.$lasttwo->products->product_image) }}" class="img-fluid  " alt="banner">
                                    <div class="media-body">
                                        <div class="media-contant">
                                            <div>
                                                @if ($reviews == 0)
                                                <div>@lang('tr.Not Rated Yet')</div>
                                                @else
                                                <div>
                                                    @for ($i = 0; $i < $reviews; $i++)
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
                            
                            <div class="media-banner-box">
                                <div class="media-view">
                                    <h5><a href="{{ route('frontend_discounts') }}">@lang('tr.View More')</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6  col-12">
                <div class="Jewellery-banner" style="background-image:url({{ asset('frontend/lastbundle.jpg') }})">
                    <a style="color:white;text-align:center;">@lang('tr.Last Bundle')</a>
                    @if ($lastBundle != null)
                    <h6 style="color:white;text-align:center;">{{ $lastBundle->$langName }}</h6>
                    @endif
                </div>
            </div>
            <div class="col-lg-7  col-sm-12 col-12  ">
                <div class="hot-deal">
                    <div class="hot-deal-box">
                        <div class="slide-1">

                            @foreach ($lasttwoHotOffer as $lasttwo)

                            @php($start = \Carbon\Carbon::parse($lasttwo->end_date))
                            @php($end = \Carbon\Carbon::parse(date('y-m-d')))
                            @php($result = $start->diffInDays($end, false))
                        
                            
                        
                            <div>
                                <div class="hot-deal-contain1 hot-deal-banner-1">
                                    <div class="hot-deal-heading">
                                        <h5>@lang('tr.Last Hot Deal')</h5>
                                    </div>
                                    <div class="row hot-deal-subcontain">
                                        <div class="col-lg-4 col-sm-4 col-12">
                                            <div class="hotdeal-right-slick-1 no-arrow">
                                                <div class="right-slick-img"><img style="width:205px;height:263px;" src="{{ asset('backend/dashboard_images/Products/'.$lasttwo->product->product_image) }}" alt="hot-deal" class="img-fluid  "></div>
                                                @foreach ($lasttwo->product->getGalleryImages() as $image)
                                                    <div class="right-slick-img"><img style="width:205px;height:263px;" src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}" alt="hot-deal" class="img-fluid  "></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">

                                            <div>
                                                <h5>@lang('tr.Expire In'): <span style="color:#b22827">{{  abs($result)  }}</span> &nbsp;@lang('tr.Day(s)')</h5>
                                                <h5>@lang('tr.End Date'): <span style="color:#b22827">{{  $lasttwo->end_date  }}</span></h5>
                                                <hr>
                                                
                                                @if ($reviews[0]->reviews == 0)
                                                <div>@lang('tr.Not Rated Yet')</div>
                                                @else
                                                <div>
                                                    @for ($i = 0; $i < $reviews[0]->reviews; $i++)
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
                                                        <br>
                                                        <a href="{{ route('frontend_product_details',$lasttwo->product->id) }}" class="details-o">@lang('tr.Details')</a>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-2 col-sm-2 p-l-md-0">
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
    </div>
</section>
<!--media banner end-->