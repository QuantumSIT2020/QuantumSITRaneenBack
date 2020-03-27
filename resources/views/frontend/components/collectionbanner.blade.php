<section class="collection-banner section-pt-space pl-3">
    <div class="custom-container">
        <div class="row collection collection-layout1">
            <div class="col-md-4 offset-xl-2 p-r-md-0">
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
            </div>
            <div class="col-md-4 col-4">
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
            </div>




            <div class="col-md-2  pl-md-0">
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
            </div>

        </div>
    </div>
</section>