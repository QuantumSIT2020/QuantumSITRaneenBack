@extends('backend.layouts.master')

@section('title',__('tr.Create Manufacturer'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('manufacturers') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Manufacturer')</a>
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
            <form id="advanced-form" action="{{ route('store_manufacturers') }}" method="POST" enctype="multipart/form-data" data-parsley-validate="" novalidate="" autocomplete="off">
                @csrf
                {{-- First & Last Name --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input1">@lang('tr.Arabic Name')</label>
                            <input type="text" id="text-input1" value="{{ old('ar_name') }}" name="ar_name" class="form-control" required="" data-parsley-minlength="2">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input2">@lang('tr.English Name')</label>
                            <input type="text" id="text-input2" value="{{ old('en_name') }}" name="en_name" class="form-control" required="" data-parsley-minlength="2">
                        </div>
                    </div>
                </div>

                {{-- Emails --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input3">@lang('tr.Mobile')</label>
                            <input type="text" id="text-input3" value="{{ old('mobile') }}" name="mobile" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Email')</label>
                            <input type="email" id="text-input3" value="{{ old('email') }}" name="email" class="form-control">
                        </div>
                    </div>
                </div>

                {{-- Emails --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input3">@lang('tr.Address')</label>
                            <input type="text" id="text-input3" value="{{ old('address') }}" name="address" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Website')</label>
                            <input type="url" id="text-input3" value="{{ old('website') }}" name="website" class="form-control">
                        </div>
                    </div>
                </div>

                {{-- Passwords --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="text-input9">@lang('tr.Other Info')</label>
                            <textarea id="ckeditor" name="other_info">
                                
                            </textarea>
                        </div>
                    </div>
                </div>

                {{-- Gender & Date of Birth --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Logo')</label>
                            <input type="file" id="text-input5" value="{{ old('manufacturer_logo') }}" name="manufacturer_logo" class="custom-select">
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