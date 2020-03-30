@extends('frontend.layouts.master')

@section('title',__('tr.Bundles Details'))

@section('content')

@section('breads')
    <li><i class="fa fa-angle-double-right"></i></li>
    <li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<body class="bg-light ">

<!-- section start -->
<section class="section-big-pt-space bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-5">

                    <div class="product-slick no-arrow">
                        <div><img src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$main_product->MainProduct->product_image }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                        @foreach ($bundle->getMainGallery() as $image)
                            <div><img src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}"  alt="" class="img-fluid  image_zoom_cls-1"></div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                <div><img src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$main_product->MainProduct->product_image }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                                @foreach ($bundle->getMainGallery() as $image)
                                    <div><img src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}"  alt="" class="img-fluid  image_zoom_cls-1"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-7 rtl-text">


                    <div class="product-right">
                        <h2>{{$main_product->MainProduct->en_name}}</h2>
                        <h3>{{$main_product->MainProduct->price}}</h3>


                        <div class="product-buttons"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">buy now</a></div>
                        <div class="border-product">
                            <h6 class="product-title">product details</h6>
                            <p>{!! $main_product->MainProduct->description !!}</p>
                        </div>

                        <div class="border-product pb-0">
                            <h6 class="product-title">Time Reminder</h6>
                            <div class="timer">
                                @php($start = \Carbon\Carbon::parse($bundle->end))
                                @php($end = \Carbon\Carbon::parse(date('y-m-d')))
                                @php($result = $start->diffInDays($end, false))
                                @if($result < 0)

                                <p id="demo"><span style="background: #b22827; color: white; padding: 10px;">{{abs($result)}} @lang('tr.Days')</span>
{{--                                    <span>00 <span class="padding-l">:</span> <span class="timer-cal">@lang('tr.Hrs')</span> </span>--}}
{{--                                    <span>00 <span class="padding-l">:</span>--}}
{{--                                        <span class="timer-cal">@lang('tr.Mins')</span>--}}
{{--                                        </span><span>00 <span class="timer-cal">@lang('tr.Sec')</span></span>--}}
                                </p>
                                    @endif
                            </div>
                        </div>
                        <div class="border-product pb-0">
                            <h6 class="product-title">Frequently bought together</h6>
                            <div class="bundle">
                                <div class="bundle_img">

                                    @foreach($product_bundle as $product)
                                        <div class="img-box">
                                            <a href="#"><img style="width:100px;height:100px;" src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$product->BundleProduct->product_image }}" alt="" class="img-fluid "></a>
                                        </div>
                                        <span class="plus">+</span>
                                    @endforeach


                                </div>

                            </div>


                        </div>


                        <div class="border-product pb-0">
                            <h6 class="product-title">package price</h6>
                            <div class="timer">

                                <h3><span style="background: #b22827; color: white; padding: 10px;">
                            {{$bundle->price}} @lang('tr.LE')

                            </span>

                                </h3>


                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->




<!-- product-tab starts -->
<section class=" tab-product  tab-exes">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="creative-card creative-inner">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Description</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">Details</a>
                            <div class="material-border"></div>
                        </li>

                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <p>{!! $bundle->en_description!!}</p>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">

                            <div class="single-product-tables">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="border_cell">@lang('tr.Image')                   </th>
                                        <th class="border_cell">@lang('tr.Name')                    </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product_bundle as $product)
                                        <tr>
                                            <td><img style="width:100px;height:100px;" src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$product->BundleProduct->product_image }}" alt="" class="img-fluid "></td>
                                            @if(\Lang::getLocale() == 'en')
                                                <td>{{ $product->BundleProduct->en_name }}</td>
                                            @else
                                                <td>{{ $product->BundleProduct->ar_name }}</td>

                                            @endif


                                        </tr>


                                    @endforeach
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <th class="border_cell">@lang('tr.Image')            </th>
                                        <th class="border_cell">@lang('tr.Name')             </th>

                                    </tr>
                                    </tfoot>
                                </table>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->





</body>


@include('frontend.components.contactbanner')

@endsection

@section('javascript')

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e817cf1047b80c5"></script>
    <script >
        $(".plus:last-child").remove()
    </script>

@endsection
