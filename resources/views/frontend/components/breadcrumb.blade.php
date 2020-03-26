<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>@yield('title')</h2>
                        <ul>
                            <li><a href="{{ route('home') }}">@lang('tr.Home')</a></li>
                            @yield('breads')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>