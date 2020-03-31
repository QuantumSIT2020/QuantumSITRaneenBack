
<section class="theme-slider pb-0 pl-3 pt-3">
    <div class="custom-container">
    
        <div class="row">
            <div class="col-xl-8 col-lg-9 offset-xl-2 " id="rtlslide">

                @if (count($Sliders) > 0)

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        @for ($i = 0; $i < count($Sliders); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i+1 }}" class="active"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner">
                        @foreach($Sliders  as $slider)

                        <div class="carousel-item">
                            @php($link = explode('#',$slider->slider_link))
                            @if ($link[0] == 'hot')
                                @if ($link[1] == 'all')
                                <a href="{{ route('frontend_hotoffers') }}">
                                    <img class="d-block w-100 " style="height:400px" src="{{ asset('backend/dashboard_images/sliders/'.$slider->slider_image) }}" alt="First slide">
                                </a>
                                @else
                                <a href="{{ route('frontend_hotoffers') }}">
                                    <img class="d-block w-100 " style="height:400px" src="{{ asset('backend/dashboard_images/sliders/'.$slider->slider_image) }}" alt="First slide">
                                </a>
                                @endif
                            @endif

                            @if ($link[0] == 'discounts')
                                @if ($link[1] == 'all')
                                <a href="{{ route('frontend_hotoffers') }}">
                                    <img class="d-block w-100 " style="height:400px" src="{{ asset('backend/dashboard_images/sliders/'.$slider->slider_image) }}" alt="First slide">
                                </a>
                                @else
                                <a href="{{ route('frontend_hotoffers') }}">
                                    <img class="d-block w-100 " style="height:400px" src="{{ asset('backend/dashboard_images/sliders/'.$slider->slider_image) }}" alt="First slide">
                                </a>
                                @endif
                            @endif

                            @if ($link[0] == 'sub')
                                <a href="{{ route('frontend_brandcategory',$link[1]) }}">
                                    <img class="d-block w-100 " style="height:400px" src="{{ asset('backend/dashboard_images/sliders/'.$slider->slider_image) }}" alt="First slide">
                                </a>
                            @endif

                            @if ($link[0] == 'product')
                                <a href="{{ route('frontend_product_details',$link[1]) }}">
                                    <img class="d-block w-100 " style="height:400px" src="{{ asset('backend/dashboard_images/sliders/'.$slider->slider_image) }}" alt="First slide">
                                </a>
                            @endif
                            
                        </div>

                    @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>

                @else

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 " style="height:400px" src="{{ asset('frontend/slide1.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100 " style="height:400px" src="{{ asset('frontend/slide2.png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100 " style="height:400px" src="{{ asset('frontend/slide3.png') }}" alt="First slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
                    
                @endif

                

            </div>

            
            @if($lastHotOffer != null)
            <div class="col-xl-2 col-sm-3 pl-0 offer-banner" style="background:white;">
                <div class="offer-banner-img">
                    <img src="{{ asset('backend/dashboard_images/Products/'.$lastHotOffer->product->product_image) }}" style="position: absolute; top: 0; bottom: 0; margin: auto; width: 100%; height: 220px;" alt="offer-banner" class="img-fluid  ">
                </div>
                <div class="banner-contain" style="border: 2px dashed #b2282729;">
                    <div>
                        <h5 style="text-align: center; color: #b22827; font-weight: bold; font-size: 31px;">{{$lastHotOffer->product->en_name}}</h5>
                        <div class="discount-offer" style="margin-top: 229px;">
                            <h1 style="color:#b22827">{{$lastHotOffer->offer}}%</h1></div>
                    </div>
                </div>
            </div>

            @else
            <div class="col-xl-2 col-sm-3 pl-0 offer-banner">
                <div class="offer-banner-img">
                    <img src="{{ asset('frontend/assets/images/layout-1/offer-banner.png') }}" alt="offer-banner" class="img-fluid  ">
                </div>
                <div class="banner-contain">
                    <div>
                        <h5>@lang('tr.There is No Latest Offer')</h5>
                        <div class="discount-offer">
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>


@section('javascript')
    <script>
        $(document).ready(function(){
            $('.carousel-inner div:first').addClass('active');
            $('.carousel-indicators li:first').addClass('active');
        });
    </script>
@endsection