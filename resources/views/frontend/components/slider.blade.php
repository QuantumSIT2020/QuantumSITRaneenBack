
<section class="theme-slider pb-0 pl-3 pt-3">
    <div class="custom-container">
    
        <div class="row">
            <div class="col-xl-8 col-lg-9 offset-xl-2 " id="rtlslide">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($Sliders  as $slider)

                        <div class="carousel-item">
                            <img class="d-block w-100 " style="height:400px" src="{{ asset('backend/dashboard_images/sliders/'.$slider->slider_image) }}" alt="First slide">
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

            </div>

            <div class="col-xl-2 col-sm-3 pl-0 offer-banner">
                <div class="offer-banner-img">
                    <img src="{{ asset('backend/dashboard_images/Products/'.$lastHotOffer->product->product_image) }}" alt="offer-banner" class="img-fluid  ">
                </div>
                <div class="banner-contain">
                    <div>
                        <h5>{{$lastHotOffer->product->en_name}}</h5>
                        <div class="discount-offer">
                            <h1>{{$lastHotOffer->offer}}%</h1></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@section('javascript')
    <script>
        $(document).ready(function(){
            $('.carousel-inner div:first').addClass('active');
        });
    </script>
@endsection