
<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header ">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-5 col-md-7 col-sm-6">
                    <div class="top-header-left">
                        <div class="shpping-order">
                            <h6>free shipping on order over $99 </h6>
                        </div>
                        <div class="app-link">
                            <h6>
                                Download aap
                            </h6>
                            <ul>
                                <li><a><i class="fa fa-apple" ></i></a></li>
                                <li><a><i class="fa fa-android" ></i></a></li>
                                <li><a><i class="fa fa-windows" ></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-5 col-sm-6">
                    <div class="top-header-right">

                        <div class="language-block">
                            <div class="language-dropdown">
                                <span class="language-dropdown-click">
                                english <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                                <ul class="language-dropdown-open">
                                    <li><a href="#">english</a></li>
                                    <li><a href="#">العربية</a></li>

                                </ul>
                            </div>
                            <div class="curroncy-dropdown">
                                <span class="curroncy-dropdown-click">
                                usd<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                                <ul class="curroncy-dropdown-open">
                                    <li><a href="#"><i class="fa fa-inr"></i>inr</a></li>
                                    <li><a href="#"><i class="fa fa-usd"></i>usd</a></li>
                                    <li><a href="#"><i class="fa fa-eur"></i>eur</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-header1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-menu-block">
                        <div class="menu-left">
                            
                            @include('frontend.components.allcategorymobile')

                            <div class="brand-logo">

                                <a href="#">
                                    <img class="logo-width-top" src="{{ asset('frontend/assets/images/layout-2/logo/logo-ranen.png') }}" class="img-fluid  " alt="logo-header">
                                </a>
                            </div>
                        </div>
                        <div class="menu-right">
                            <div class="toggle-block">
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <!--HOME-->
                                        <li>
                                            <a href="{{ route('home') }}">@lang('tr.Home')</a>
                                        </li>
                                        <!--HOME-END-->

                                        {{-- Products --}}
                                        <li>
                                            <a href="#">@lang('tr.Products')</a>

                                            <ul>
                                                <li><a href="{{ route('frontend_maincategory') }}">@lang('tr.Products')</a>
                                                <li><a href="{{ route('frontend_discounts') }}">@lang('tr.Discounts')</a>
                                                <li><a href="{{ route('frontend_hotoffers') }}">@lang('tr.Hot Deals')</a>
                                                <li><a href="{{ route('frontend_bundles') }}">@lang('tr.Bundles')</a>
                                            </ul>
                                        </li>
                                        {{-- End Products --}}

                                       
                                        <!--mega-meu start-->
                                        <li>
                                            <a href="#">@lang('tr.Blogs')</a>

                                            <ul>
                                                <li><a href="{{ route('frontend_blogs') }}">@lang('tr.Blogs')</a></li>
                                                <li><a href="{{ route('frontend_news') }}">@lang('tr.News')</a></li>
                                            </ul>
                                        </li>



                                        <!--blog-meu start-->
                                        <li>
                                            <a href="#">@lang('tr.More')</a>

                                            <ul>
                                                <a class="dropdown-item hidden-lg hidden-md" href="{{ route('frontend_faq') }}" target="_blank">@lang('tr.FAQ')</a>
                                                @php($viewpages =  App\Models\pages::select('page_image','id as id','en_name','ar_name')->orderBy('id', 'asc')->get())
                                                @foreach($viewpages as $page)
                                                    <a class="dropdown-item hidden-lg hidden-md" href="{{ route('frontend_pages',$page->id) }}" target="_blank">{{ $page->en_name }}</a>
                                                @endforeach
                                                <a class="dropdown-item hidden-lg hidden-md" href="{{ route('frontend_contactus') }}" target="_blank">@lang('tr.Contact Us')</a>

                                            </ul>
                                        </li>
                                        <!--blog-meu end-->
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        @if(isset(Auth::user()->id))
                                            @if(Auth::user()->id != null)
                                            <li class="mobile-user onhover-dropdown"><a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-user"></i> <div class="cart-item"><div> <span>{{ Auth::user()->name }}</span></div></div></a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>    
                                            @else
                                                <li class="mobile-user onhover-dropdown" ><a href="{{ route('frontend_login') }}"><i class="icon-user"></i> <div class="cart-item"><div> <span>login</span></div></div></a></li>
                                            @endif
                                        @else
                                            <li class="mobile-user onhover-dropdown" ><a href="{{ route('frontend_login') }}"><i class="icon-user"></i> <div class="cart-item"><div> <span>login</span></div></div></a></li>
                                        @endif
                                                
                                        
                                        <li class="mobile-wishlist" onclick="openWishlist()">
                                            <a href="#" title="@lang('tr.Wishlists')">
                                                <i class="icon-heart"></i>
                                                <div class="cart-item" id="wishList">
                                                    @php($wishList = \App\Models\Product::wishLists())
                                                    <div><span id="wishVal">{{ $wishList }}</span></div>
                                                </div>
                                            </a>
                                        </li>

                                        @include('frontend.components.mobilesearch')

                                        
                                        <li class="mobile-setting mobile-setting-hover" onclick="openSetting()"><a href="#"><i class="icon-settings"></i></a>
                                        </li>
                                    </ul>
                                    <div class="cart-block mobile-cart cart-hover-div" onclick="openCart()">
                                    <a href="#"><span class="cart-product">{{ Cart::count() }}</span><i class="icon-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="category-header ">
        <div class="custom-container">
            
            <div class="row">
                <div class="col">
                    <div class="navbar-menu  ">
                        <div class="category-left">
                            <div class=" nav-block">
                                <div class="nav-left">
                                    <nav class="navbar navbar-fixed-top">
                                        <button class="navbar-toggler" type="button">
                                        <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                                    </button>
                                        <h5 class="mb-0 ml-3 text-white title-font">Shop by category</h5>
                                    </nav>
                                    @yield('allcategories')
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="input-box">
                                    
                                    @include('frontend.components.normalsearch')
                                    
                                </div>
                            </div>
                        </div>
                        <div class="category-right">
                            <div class="contact-block">
                                <div>
                                    <i class="fa fa-volume-control-phone"></i>
                                    <span>call us<span>123-456-76890</span></span>
                                </div>
                            </div>
                            <div class="btn-group">
                                <div class="gift-block" data-toggle="dropdown">
                                    <div class="grif-icon">
                                        <i class="icon-gift"></i>
                                    </div>
                                    <div class="gift-offer">
    
                                        <span>Hot Deals</span>
                                    </div>
                                </div>
                                <div class="dropdown-menu gift-dropdown">
                                    <div class="media">
                                        <div class="mr-3">
                                            <img src="{{ asset('frontend/assets/images/icon/1.png') }}" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Billion Days</h5>
                                            <p><img src="{{ asset('frontend/assets/images/icon/currency.png') }}" class="cash" alt="gift-block"> Flat Rs. 270 Rewards</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <img src="{{ asset('frontend/assets/images/icon/1.png') }}" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Fashion Discount</h5>
                                            <p><img src="{{ asset('frontend/assets/images/icon/fire.png') }}" class="fire" alt="gift-block">Extra 10% off (upto Rs. 10,000*) </p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <img src="{{ asset('frontend/assets/images/icon/3.png') }}" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">75% off Store</h5>
                                            <p>No coupon code is required.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <img src="{{ asset('frontend/assets/images/icon/6.png') }}" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Upto 50% off</h5>
                                            <p>Buy popular phones under Rs.20.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <img src="{{ asset('frontend/assets/images/icon/5.png') }}" alt="Generic placeholder image">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0">Beauty store</h5>
                                            <p><img src="{{ asset('frontend/assets/images/icon/currency.png') }}" class="cash" alt="curancy"> Flat Rs. 270 Rewards</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>



</header>

