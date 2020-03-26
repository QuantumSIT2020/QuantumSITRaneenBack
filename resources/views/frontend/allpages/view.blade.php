<!DOCTYPE html>
<html lang="en">

@include('frontend.components.head')

<body class="bg-light ">
<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="{{ asset('frontend/assets/images/loader.gif') }}" alt="loader">
    </div>
</div>
<!-- loader end -->

<!--header start-->
@include('frontend.components.header')
<!--End header start-->
<!--with slider start-->
<section class="section-big-py-space  ratio_asos" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <ul class="tabs tab-title">
                        <li class="current"><a href="tab-1"> {{$viewpages->name}} </a></li>


                    </ul>
                    <div class="tab-content-cls product">
                        <div id="tab-1" class="tab-content active default">
                            <!-- about section start -->
                            <div class="about-page section-big-py-space">
                                <div class="custom-container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="banner-section"><img src="{{ URL::to('/') }}/backend/dashboard_images/pages/{{$viewpages->page_image }}" class="img-fluid   w-100" alt="" style="height: 360px !important;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4> {{$viewpages->name}} </h4>
                                            <p class="mb-2">{!! $viewpages->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- about section end -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--with slider end-->



<!--footer-->
@include('frontend.components.footer')
<!--End footer-->

<div class="tap-top">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>

<!--add to cart bar-->
@include('frontend.components.addcartbar')
<!--End add to cart bar-->

@include('frontend.components.scripts')
</body>
</html>