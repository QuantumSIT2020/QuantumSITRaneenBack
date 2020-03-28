<section class="collection-banner section-pt-space pl-3">
    <div class="custom-container">
        <div class="row collection collection-layout1">
            <div class="col-md-4 offset-xl-2 p-r-md-0">
                
                @if($lastbeforediscounts != null)
                <div class="collection-banner-main p-left">
                    <div class="collection-img">
                        <img src="{{ asset('backend/dashboard_images/Products/'.$lastbeforediscounts->products->product_image) }}" class="img-fluid bg-img  " alt="banner">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h3>{{$lastbeforediscounts->products->en_name}}</h3>
                            <h4>{{$lastbeforediscounts->discount}}%</h4>
                            <div class="shop">
                                <a>
                                shop now
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="collection-banner-main p-left">
                    <div class="collection-img bg-size" style="background-image: url({{ asset('frontend/assets/images/layout-1/collection-banner/1.jpg') }}); background-size: cover; background-position: center center; display: block;">
                        <img src="{{ asset('frontend/assets/images/layout-1/collection-banner/1.jpg') }}" class="img-fluid bg-img  " alt="banner" style="display: none;">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h3>@lang('tr.No Product')</h3>
                            <h4>@lang('tr.No Product')</h4>
                        </div>
                    </div>
                </div>
                @endif

            </div>


            <div class="col-md-4 col-4">
                @if ($lastdiscounts != null)
                <div class="collection-banner-main p-left">
                    <div class="collection-img">
                        <img src="{{ asset('backend/dashboard_images/Products/'.$lastdiscounts->products->product_image) }}" class="img-fluid bg-img  " alt="banner">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h3>{{$lastdiscounts->products->en_name}}</h3>
                            <h4>{{$lastdiscounts->discount}}%g</h4>
                            <div class="shop">
                                <a>
                                shop now
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="collection-banner-main p-left">
                    <div class="collection-img bg-size" style="background-image: url({{ asset('frontend/assets/images/layout-1/collection-banner/2.jpg') }}); background-size: cover; background-position: center center; display: block;">
                        <img src="{{ asset('frontend/assets/images/layout-1/collection-banner/2.jpg') }}" class="img-fluid bg-img  " alt="banner" style="display: none;">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h3>@lang('tr.No Product')</h3>
                            <h4>@lang('tr.No Product')</h4>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>




            <div class="col-md-2  pl-md-0">
                @if ($beforelastHotOffer != null)
                <div class="collection-banner-main p-top banner-6">
                    <div class="collection-img">
                        <img src="{{ asset('backend/dashboard_images/Products/'.$beforelastHotOffer->product->product_image) }}" class="img-fluid bg-img  " alt="banner">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h6>{{$beforelastHotOffer->offer}}%</h6>
                            <h4>{{$beforelastHotOffer->product->en_name}}</h4>
                        </div>
                    </div>
                </div>
                @else
                <div class="collection-banner-main p-top banner-6">
                    <div class="collection-img bg-size" style="background-image: url({{ asset('frontend/assets/images/layout-1/collection-banner/7.jpg') }}); background-size: cover; background-position: center center; display: block;">
                        <img src="{{ asset('frontend/assets/images/layout-1/collection-banner/7.jpg') }}" class="img-fluid bg-img  " alt="banner" style="display: none;">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h6>@lang('tr.No Product')</h6>
                            <h4>@lang('tr.No Product')</h4>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>

        </div>
    </div>
</section>