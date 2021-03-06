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

    @yield('content')
    
    <!--add to cart bar-->
    @include('frontend.components.addcartbar')
    <!--End add to cart bar-->

    <!--footer-->
    @include('frontend.components.footer')
    <!--End footer-->

    <div class="tap-top">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    
    @include('frontend.components.addwishlist')
    
    
    <!--add notificationproduct-->
    @include('frontend.components.notificationproduct')
    <!--End add notificationproduct-->



    @include('frontend.components.scripts')
    
    
    
</body>
</html>