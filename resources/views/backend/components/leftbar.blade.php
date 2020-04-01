<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{ route('dashboard_index') }}"><img src="http://164.68.111.29/QuantumSITRaneenBack/public/frontend/assets/images/layout-2/logo/logo-ranen.png" alt="Raneen Logo" class="img-fluid logo"></a>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{ asset('backend/assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown mt-2">
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>{{  __('tr.Logout')  }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                
                <li class="active open"><a href="{{ route('dashboard_index') }}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>

                <li class="header">@lang('tr.Users Management')</li>

                <li>
                    <a href="#myPage" class="has-arrow"><i class="icon-user-follow"></i><span>@lang('tr.Roles')</span></a>
                    <ul>
                        <li><a href="{{ route('create_roles') }}">@lang('tr.Create Roles')</a></li>
                        <li><a href="{{ route('roles') }}">@lang('tr.All Roles')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#myPage" class="has-arrow"><i class="icon-users"></i><span>@lang('tr.Users')</span></a>
                    <ul>
                        {{-- @can('create_customers') --}}
                        <li><a href="{{ route('create_customers') }}">@lang('tr.Create Customer')</a></li>  
                        {{-- @endcan --}}

                        {{-- @can('show_customers') --}}
                        <li><a href="{{ route('customers') }}">@lang('tr.All Customers')</a></li>
                        {{-- @endcan --}}

                        {{-- @can('create_buyers') --}}
                        <li><a href="{{ route('create_buyers') }}">@lang('tr.Create Buyer')</a></li>
                        {{-- @endcan --}}

                        {{-- @can('show_customers') --}}
                        <li><a href="{{ route('buyers') }}">@lang('tr.All Buyers')</a></li>
                        {{-- @endcan --}}

                        {{-- @can('create_data_entry') --}}
                        <li><a href="{{ route('create_dataentry') }}">@lang('tr.Create Data Entry')</a></li>
                        {{-- @endcan --}}

                        {{-- @can('show_data_entry') --}}
                        <li><a href="{{ route('dataentry') }}">@lang('tr.All Data Entries')</a></li>
                        {{-- @endcan --}}
                    </ul>
                </li>





{{--                categories--}}


                <li class="header">@lang('tr.Categories Management')</li>
                <li>
                    <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>@lang('tr.Categories')</span></a>
                    <ul>
                        <li><a href="{{ route('MainCategory') }}">Main Category</a></li>
                        <li><a href="{{ route('ChildCategory') }}">Child Category</a></li>
                        <li><a href="{{ route('SubCategory') }}">Sub Category</a></li>

                    </ul>
                </li>


                <br>


                {{--                GroupAttributes--}}


                <li class="header">@lang('tr.Attribute Management') </li>
                <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-gears"></i><span>@lang('tr.GroupAttributes')</span></a>
                    <ul>
                        <li><a href="{{ route('GroupAttributes') }}">GroupAttributes</a></li>
                        <li><a href="{{ route('Attributes') }}">Attributes</a></li>
                    </ul>
                </li>

                <br>

                <li class="header">@lang('tr.manufacturer Management')</li>

                <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-industry"></i><span>@lang('tr.Manufacturer')</span></a>
                    <ul>
                        <li><a href="{{ route('create_manufacturers') }}">@lang('tr.Create Manufacturer')</a></li>
                        <li><a href="{{ route('manufacturers') }}">@lang('tr.Manufacturer')</a></li>

                    </ul>
                </li>




                <li class="header">@lang('tr.Brand Management')</li>

                <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-industry"></i><span>@lang('tr.Brand')</span></a>
                    <ul>
                        <li><a href="{{ route('create_brands') }}">@lang('tr.Create brand')</a></li>
                        <li><a href="{{ route('brands') }}">@lang('tr.Brand')</a></li>

                    </ul>
                </li>



                <li class="header">@lang('tr.products Management')</li>

                <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-industry"></i><span>@lang('tr.Products')</span></a>
                    <ul>

                        <li><a href="{{ route('create_products') }}">@lang('tr.Create Products')</a></li>
                        <li><a href="{{ route('products') }}">@lang('tr.Products')</a></li>
{{--                        <li><a href="{{ route('hotsale_products') }}">@lang('tr.Hot Sale')</a></li>--}}
                        <li><a href="{{ route('discount') }}">@lang('tr.Discount')</a></li>
                        <li><a href="{{ route('reviews') }}">@lang('tr.reviews')</a></li>
                        <li><a href="{{ route('orders') }}">@lang('tr.Orders')</a></li>
                    </ul>
                </li>




                {{--                Bundles--}}


                <li class="header">@lang('tr.Bundles Management') </li>
                <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-gears"></i><span>@lang('tr.Bundles')</span></a>
                    <ul>
                        <li><a href="{{ route('bundles') }}">Bundles</a></li>

                    </ul>
                </li>

                <br>





                {{-- <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-database"></i><span>@lang('tr.Inventory')</span></a>
                    <ul>
                        <li><a href="{{ route('create_inventories') }}">@lang('tr.Create Item')</a></li>
                        <li><a href="{{ route('inventories') }}">@lang('tr.Inventory')</a></li>

                    </ul>
                </li> --}}

                <br>

                {{--                pages--}}

                <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-file"></i><span>@lang('tr.Others')</span></a>
                    <ul>
                        <li><a href="{{route('partners')}}">@lang('tr.Partners')</a></li>
                        <li><a href="{{route('pages')}}">@lang('tr.Pages')</a></li>
                        <li><a href="{{route('sliders')}}">@lang('tr.sliders')</a></li>
                        <li><a href="{{route('faq')}}">@lang('tr.faq')</a></li>

                        <li><a href="{{route('blogs')}}">@lang('tr.Blogs')</a></li>

{{--                        <li><a href="{{route('blogs')}}">@lang('tr.Blogs')</a></li>--}}
                        <li><a href="{{route('testimonials')}}">@lang('tr.testimonials')</a></li>
                        <li><a href="{{route('contactus')}}">@lang('tr.contact us')</a></li>
                        <li><a href="{{route('Subscribe')}}">@lang('tr.Subscribe')</a></li>

                        <li><a href="{{ route('testseo_index') }}">@lang('tr.SEO')</a></li>
                        <li><a href="{{ route('soicalmedia_index') }}">@lang('tr.Social Media')</a></li>
                    </ul>
                </li>



            </ul>
        </nav>
    </div>
</div>