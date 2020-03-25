@extends('backend.layouts.master')

@section('title',__('tr.Show Product '.$product->en_name.' | '.$product->ar_name))

{{-- additional stylesheets --}}
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/animate-css/vivify.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/light-gallery/css/lightgallery.css') }}">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('products') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Products')</a>
    <a href="{{ route('create_dataentry') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Create New Products')</a>
</div>
@endsection

{{-- content --}}
@section('content')
 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                @php($langName = \Lang::getLocale().'_name')
                <a href="#"><img class="img-fluid img-thumbnail" src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" alt="..."></a>
                <h5 class="mt-4">{{ $product->$langName }}</h5>
                <p>{!! $product->description !!}</p>
                <div class="mt-3">
                    <div><strong class="d-inline-block w-70px">@lang('tr.Manufacturer'):</strong> {{ $product->Manufacturer->$langName }}</div>
                    <div><strong class="d-inline-block w-70px">@lang('tr.Brand'):</strong> {{ $product->SubCategory->$langName }}</div>
                    <div><strong class="d-inline-block w-70px">@lang('tr.Price'):</strong> {{ $product->price }}</div>
                    <div><strong class="d-inline-block w-70px">@lang('tr.Quantity'):</strong> {{ $product->quantity }}</div>
                    <div><strong class="d-inline-block w-70px">@lang('tr.Video'):</strong> {{ $product->video }}</div>
                </div>
                <p class="mt-5">@lang('tr.Attributes')</p>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-group">
                            @foreach ($attribute as $attrib)
                                <li class="list-group-item d-flex justify-content-between align-items-center">{{ $attrib->attribute->$langName }}<span class="badge badge-info">{{ $attrib->values }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
 </div>

 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <h4>@lang('tr.Gallery')</h4><hr>
                <div id="lightgallery" class="row clearfix lightGallery">
                    @foreach ($gallery as $image)
                        <div class="col-lg-3 col-md-6 m-b-30"><img class="img-fluid rounded img-thumbnail" src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}" style="width:300px;height:300px;" alt=""></a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 </div>

    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
<script src="{{ asset('backend/assets/bundles/lightgallery.bundle.js') }}"></script><!-- Light Gallery Plugin Js --> 
<script src="{{ asset('backend/assets/js/pages/medias/image-gallery.js') }}"></script>
@endsection
{{-- end additional scripts --}}