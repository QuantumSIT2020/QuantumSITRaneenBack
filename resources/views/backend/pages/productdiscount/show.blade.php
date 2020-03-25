@extends('backend.layouts.master')

@section('title',__('tr.Discount Details'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">

                <div class="col-md-6 col-sm-12">
                    <h2>@lang('tr.Discount Details')</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('discount')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>@lang('tr.Info')</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <small class="text-muted">@lang('tr.Product Image'): </small>

                        <div>
                            <img src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$product_sale->products->product_image }}" class="img-thumbnail"  frameborder="0" style="border:0;height:300px;width: 100%;" allowfullscreen>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h2>@lang('tr.Basic Information')</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>*@lang('tr.Name'):</label>
                                    <input type="text"  class="form-control m-input"  disabled  value="{{ $product_sale->products->en_name}}">

                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>*@lang('tr.Discount'):</label>
                                    <input type="text"  class="form-control m-input"  disabled  value="{{ $product_sale->discount}}">

                                </div>
                            </div>





                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('stylesheet')

@endsection
{{-- end additional scripts --}}

