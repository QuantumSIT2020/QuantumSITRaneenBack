<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                @include('backend.components.breadcrumb')
                @yield('morebtn')
            </div>
        </div>

        @yield('content')
    </div>
</div>