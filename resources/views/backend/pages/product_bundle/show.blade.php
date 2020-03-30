@extends('backend.layouts.master')

@section('title',__('tr.Show bundles '.$bundle->en_name.' | '.$bundle->ar_name))

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/animate-css/vivify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/light-gallery/css/lightgallery.css') }}">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('bundles') }}" class="btn btn-sm btn-primary" title="">@lang('tr.bundles')</a>
        <a href="{{ route('create_bundles') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Create New bundles')</a>
    </div>
@endsection

{{-- content --}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="body">
                    @php($langName = \Lang::getLocale().'_name')
                    <h5 class="mt-4">{{ $bundle->$langName }}</h5>
                    <p>{!! $bundle->en_description !!}</p>
                    <hr>
                    <p>{!! $bundle->ar_description !!}</p>
                    <div class="mt-3">
                        <div><strong class="d-inline-block w-70px">@lang('tr.Price'):</strong> {{ $bundle->price }}</div>
                        <div><strong class="d-inline-block w-70px">@lang('tr.start'):</strong> {{ $bundle->start }}</div>
                        <div><strong class="d-inline-block w-70px">@lang('tr.end'):</strong>   {{ $bundle->end }}</div>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="row">

            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="card c_grid c_yellow">
                    <div class="body text-center ribbon">
                        <div class="circle">
                            <img class="rounded-circle" src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$main_product->MainProduct->product_image }}" alt="">
                        </div>
                        @if(\Lang::getLocale() == 'en')
                            <h5 class="mt-3 mb-0">{{ $main_product->MainProduct->en_name }}</h5>
                        @else
                            <h5 class="mt-3 mb-0">{{ $main_product->MainProduct->ar_name }}</h5>
                        @endif

                    </div>
                </div>
            </div>

    </div>





    <div class="row">

        @foreach($product_bundle as $bundle)
        <div class="col-lg-6 col-md-4 col-sm-6">
            <div class="card c_grid c_yellow">
                <div class="body text-center ribbon">
                    <div class="circle">
                        <img class="rounded-circle" src="{{ URL::to('/') }}/backend/dashboard_images/products/{{$bundle->BundleProduct->product_image }}" alt="">
                    </div>
                    @if(\Lang::getLocale() == 'en')
                        <h5 class="mt-3 mb-0">{{ $bundle->BundleProduct->en_name }}</h5>
                    @else
                        <h5 class="mt-3 mb-0">{{ $bundle->BundleProduct->ar_name }}</h5>
                    @endif

                </div>
            </div>
        </div>

            @endforeach

    </div>


@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
    <script src="{{ asset('backend/assets/bundles/lightgallery.bundle.js') }}"></script><!-- Light Gallery Plugin Js -->
    <script src="{{ asset('backend/assets/js/pages/medias/image-gallery.js') }}"></script>
@endsection
{{-- end additional scripts --}}