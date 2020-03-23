<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{ route('dashboard_index') }}"><img src="{{ asset('backend/assets/images/icon.svg') }}" alt="Raneen Logo" class="img-fluid logo"><span>Raneen</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{ asset('backend/assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Louis Pierce</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
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
                        <li><a href="{{ route('create_customers') }}">@lang('tr.Create Customer')</a></li>
                        <li><a href="{{ route('customers') }}">@lang('tr.All Customers')</a></li>
                        <li><a href="{{ route('create_buyers') }}">@lang('tr.Create Buyer')</a></li>
                        <li><a href="{{ route('buyers') }}">@lang('tr.All Buyers')</a></li>
                        <li><a href="{{ route('create_dataentry') }}">@lang('tr.Create Data Entry')</a></li>
                        <li><a href="{{ route('dataentry') }}">@lang('tr.All Data Entries')</a></li>
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


                <li class="header">@lang('tr.GroupAttributes Management') </li>
                <li>
                    <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>@lang('tr.GroupAttributes')</span></a>
                    <ul>
                        <li><a href="{{ route('GroupAttributes') }}">GroupAttributes</a></li>
                        <li><a href="{{ route('Attributes') }}">Attributes</a></li>


                    </ul>
                </li>

                <br>

                <li class="header">@lang('tr.Product Management')</li>

                <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-industry"></i><span>@lang('tr.Manufacturer')</span></a>
                    <ul>
                        <li><a href="{{ route('create_manufacturers') }}">@lang('tr.Create Manufacturer')</a></li>
                        <li><a href="{{ route('manufacturers') }}">@lang('tr.Manufacturer')</a></li>

                    </ul>
                </li>

                {{-- <li>
                    <a href="#Authentication" class="has-arrow"><i class="fa fa-database"></i><span>@lang('tr.Inventory')</span></a>
                    <ul>
                        <li><a href="{{ route('create_inventories') }}">@lang('tr.Create Item')</a></li>
                        <li><a href="{{ route('inventories') }}">@lang('tr.Inventory')</a></li>

                    </ul>
                </li> --}}

                <br>

                {{--                pages--}}


                <li class="header">Pages</li>

                <li><a href="{{route('pages')}}"><i class="icon-puzzle"></i><span>Pages</span></a></li>

                <br>

                {{--                blogs--}}


                <li class="header">Blogs</li>

                <li><a href="{{route('blogs')}}"><i class="icon-puzzle"></i><span>Blogs</span></a></li>


                <br>
                {{--                settings--}}


                <li class="header">Settings</li>
                <li>
                    <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>Settings</span></a>
                    <ul>
                        <li><a href="{{ route('testseo_index') }}">Seo</a></li>
                        <li><a href="{{ route('soicalmedia_index') }}">Soicalmedia</a></li>


                    </ul>
                </li>






            </ul>
        </nav>
    </div>
</div>