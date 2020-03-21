<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                @include('backend.components.breadcrumb')
                @yield('morebtn')
            </div>
        </div>

        @if ($errors->any())
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>@lang('tr.Please Fix Errors')</h2>
                </div>
                <div class="body">
                    @foreach ($errors->all() as $error)
                        <h6 style="color:#e74c3c;">{{ $error }}</h6>
                    @endforeach 
                </div>
            </div>
        </div>
        @endif


        

        @yield('content')
    </div>
</div>