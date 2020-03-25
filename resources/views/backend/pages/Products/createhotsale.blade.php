@extends('backend.layouts.master')

@section('title',__('tr.Hot Sale'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('products') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Products')</a>
</div>
@endsection

{{-- content --}}
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2> @yield('title')</h2>
        </div>
        @php($langName = \Lang::locale().'_name')
        <div class="body">
            <form id="advanced-form" action="{{ route('store_hotsale_products',$product->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate="" novalidate="" autocomplete="off">
                @csrf
                
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
                            </div>
                        </div>
                    </div>
                
                </div>
                {{-- First & Last Name --}}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="text-input1">@lang('tr.Offer')</label>
                            <input type="number" id="text-input1" value="{{ old('offer') }}" name="offer" class="form-control" required="" data-parsley-minlength="2">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="text-input2">@lang('tr.From')</label>
                            <input type="date" id="text-input2" value="{{ old('start_date') }}" name="start_date" class="form-control" required="" data-parsley-minlength="2">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="text-input2">@lang('tr.To')</label>
                            <input type="date" id="text-input2" value="{{ old('end_date') }}" name="end_date" class="form-control" required="" data-parsley-minlength="2">
                        </div>
                    </div>
                </div>

           
              
                <button type="submit" class="btn btn-primary">@lang('tr.Save')</button>
            </form>
        </div>
        
    </div>
</div>




    
@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
<script src="{{ asset('backend/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendor/ckeditor/ckeditor.js') }}"></script><!-- Ckeditor -->
<script src="{{ asset('backend/assets/js/pages/forms/editors.js') }}"></script>
@endsection
{{-- end additional scripts --}}