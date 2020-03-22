@extends('backend.layouts.master')

@section('title',__('tr.Create Inventory Item'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('inventories') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Inventory')</a>
</div>
@endsection

{{-- content --}}
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2> @yield('title')</h2>
        </div>
        
        <div class="body">
            <form id="advanced-form" action="{{ route('store_inventories') }}" method="POST" enctype="multipart/form-data" data-parsley-validate="" novalidate="" autocomplete="off">
                @csrf
                {{-- First & Last Name --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input1">@lang('tr.Arabic Name')</label>
                            <input type="text" id="text-input1" value="{{ old('ar_name') }}" name="ar_name" class="form-control" required="" data-parsley-minlength="3">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input2">@lang('tr.English Name')</label>
                            <input type="text" id="text-input2" value="{{ old('en_name') }}" name="en_name" class="form-control" required="" data-parsley-minlength="3">
                        </div>
                    </div>
                </div>

                {{-- Emails --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input3">@lang('tr.Quantity')</label>
                            <input type="number" min="0" step="1" id="text-input3" value="{{ old('qty') }}" name="qty" class="form-control" required="" data-parsley-min="1">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Price')</label>
                            <input type="number" min="0" step="1" id="text-input3" value="{{ old('price') }}" name="price" class="form-control" required="" data-parsley-min="1">
                        </div>
                    </div>
                </div>

                {{-- Manufacturer &  Sub Category--}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input9">@lang('tr.Manufacturer')</label>
                            {!! Form::select('manufacturer_id', $mans, null, ['class'=>'custom-select','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input9">@lang('tr.Brand')</label>
                            {!! Form::select('sub_categories_id', $subCat, null, ['class'=>'custom-select','required'=>'']) !!}
                        </div>
                    </div>
                </div>

                {{-- Gender & Date of Birth --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Image')</label>
                            <input type="file" id="text-input5" value="{{ old('inventory_image') }}" name="inventory_image" class="custom-select" required="">
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
@endsection
{{-- end additional scripts --}}