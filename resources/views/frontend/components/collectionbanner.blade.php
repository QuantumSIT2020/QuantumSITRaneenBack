<section class="collection-banner section-pt-space pl-3">
    <div class="custom-container">
        <div class="row collection collection-layout1">
            <div class="col-md-4 offset-xl-2 p-r-md-0">
                
                @if($lastbeforediscounts != null)
                <div class="collection-banner-main p-left" style="border: 2px dashed #b2282729;">
                    <div class="collection-img">
                        <img src="{{ asset('backend/dashboard_images/Products/'.$lastbeforediscounts->products->product_image) }}" class="img-fluid bg-img  " alt="banner">
                    </div>
                    <div class="collection-banner-contain">
                        <div style="text-align: center; display: block; margin-left: auto; margin-right: auto;">
                            <h3>{{$lastbeforediscounts->products->en_name}}</h3>
                            <h4>{{$lastbeforediscounts->discount}}%</h4>
                            <div class="shop">
                                <a href="{{ route('frontend_product_details',$lastbeforediscounts->products->id) }}" style="background: #b22827;color: white;padding: 6px;">
                                    @lang('tr.Shop Now')
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="collection-banner-main p-left" style="border: 2px dashed #b2282729;">
                    <div class="collection-img bg-size" style="background:white; background-position: center center; display: block; background-size: contain; background-repeat: no-repeat;">
                        
                    </div>
                    <div class="collection-banner-contain">
                        <div style="text-align: center; display: block; margin-left: auto; margin-right: auto;">
                            <h3 style="color:#b22827">@lang('tr.No Product')</h3>
                            <h4 style="color:#b22827">@lang('tr.No Product')</h4>
                        </div>
                    </div>
                </div>
                @endif

            </div>


            <div class="col-md-4 col-4">
                @if ($lastdiscounts != null)
                <div class="collection-banner-main p-left" style="border: 2px dashed #b2282729;">
                    <div class="collection-img">
                        <img src="{{ asset('backend/dashboard_images/Products/'.$lastdiscounts->products->product_image) }}" class="img-fluid bg-img  " alt="banner">
                    </div>
                    <div class="collection-banner-contain">
                        <div style="text-align: center; display: block; margin-left: auto; margin-right: auto;">
                            <h3 style="color: white; text-shadow: 2px 2px 2px black;">{{$lastdiscounts->products->en_name}}</h3>
                            <h4 style="color: white; text-shadow: 2px 2px 2px black;">{{$lastdiscounts->discount}}%g</h4>
                            <div class="shop">
                                <a href="{{ route('frontend_product_details',$lastdiscounts->products->id) }}" style="background: #b22827;color: white;padding: 6px;">
                                @lang('tr.Shop Now')
                                <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="collection-banner-main p-left" style="border: 2px dashed #b2282729;">
                    <div class="collection-img bg-size" style="background-image: url({{ asset('frontend/assets/images/layout-1/collection-banner/2.jpg') }}); background-position: center center; display: block; background-size: contain; background-repeat: no-repeat;">
                        <img src="{{ asset('frontend/assets/images/layout-1/collection-banner/2.jpg') }}" class="img-fluid bg-img  " alt="banner" style="display: none;">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h3 style="color: white; text-shadow: 2px 2px 2px black;">@lang('tr.No Product')</h3>
                            <h4 style="color: white; text-shadow: 2px 2px 2px black;">@lang('tr.No Product')</h4>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>




            <div class="col-md-2  pl-md-0">
                @if ($beforelastHotOffer != null)
                <div class="collection-banner-main p-top banner-6" style="border: 2px dashed #b2282729;background: white;">
                    <div class="collection-img">
                        <img src="{{ asset('backend/dashboard_images/Products/'.$beforelastHotOffer->product->product_image) }}" style="width:250px;" class="img-fluid bg-img  " alt="banner">
                    </div>
                    <div class="collection-banner-contain" >
                        <div style="text-align: center; display: block; margin-left: auto; margin-right: auto;">
                            <h6 style="text-align: center; display: block; margin-left: auto; margin-right: auto; position: absolute; top: 100px; left: 100px; color: white; text-shadow: 1px 1px 1px black;">{{$beforelastHotOffer->offer}}%</h6>
                            <h4 style="text-align: center; display: block; margin-left: auto; margin-right: auto; position: absolute; top: 110px; left: 100px; color: white; text-shadow: 1px 1px 1px black;">{{$beforelastHotOffer->product->en_name}}</h4>
                        </div>
                    </div>
                </div>
                @else
                <div class="collection-banner-main p-top banner-6" style="border: 2px dashed #b2282729;">
                    <div class="collection-img bg-size" style="background-image: url({{ asset('frontend/assets/images/layout-1/collection-banner/7.jpg') }}); background-position: center center; display: block; background-size: contain; background-repeat: no-repeat;">
                        <img src="{{ asset('frontend/assets/images/layout-1/collection-banner/7.jpg') }}" class="img-fluid bg-img  " alt="banner" style="display: none;">
                    </div>
                    <div class="collection-banner-contain">
                        <div>
                            <h6 style="text-align: center; display: block; margin-left: auto; margin-right: auto; position: absolute; top: 110px; left: 100px; color: white; text-shadow: 1px 1px 1px black;">@lang('tr.No Product')</h6>
                            <h4 style="text-align: center; display: block; margin-left: auto; margin-right: auto; position: absolute; top: 100px; left: 100px; color: white; text-shadow: 1px 1px 1px black;">@lang('tr.No Product')</h4>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>

        </div>
    </div>
</section>