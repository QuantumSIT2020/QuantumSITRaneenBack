@extends('backend.layouts.master')

@section('title',__('tr.Create Customers'))

{{-- additional stylesheets --}}
@section('stylesheet')
    
@endsection
{{-- end additional stylesheets --}}

@section('morebtn')
<div class="col-md-6 col-sm-12 text-right hidden-xs">
    <a href="{{ route('customers') }}" class="btn btn-sm btn-primary" title="">@lang('tr.Customers')</a>
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
            <form id="advanced-form" action="{{ route('store_customers') }}" method="POST" data-parsley-validate="" novalidate="" autocomplete="off">
                @csrf
                {{-- First & Last Name --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input1">@lang('tr.First Name')</label>
                            <input type="text" id="text-input1" value="{{ old('first_name') }}" name="first_name" class="form-control" required="" data-parsley-minlength="3">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input2">@lang('tr.Last Name')</label>
                            <input type="text" id="text-input2" value="{{ old('last_name') }}" name="last_name" class="form-control" required="" data-parsley-minlength="3">
                        </div>
                    </div>
                </div>

                {{-- Emails --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input3">@lang('tr.Email Address')</label>
                            <input type="email" id="text-input3" value="{{ old('email') }}" name="email" class="form-control" required="" data-parsley-email="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input4">@lang('tr.Order Email Address')</label>
                            <input type="email" id="text-input4" value="{{ old('order_email') }}" name="order_email" class="form-control" required="" data-parsley-email="">
                        </div>
                    </div>
                </div>

                {{-- Passwords --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input9">@lang('tr.Password')</label>
                            <input type="password" autocomplete="new-password" id="text-input9" name="password" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input10">@lang('tr.Confirm Password')</label>
                            <input type="password" autocomplete="new-password" id="text-input10" name="password_confirmation" class="form-control" required="">
                        </div>
                    </div>
                </div>

                {{-- Gender & Date of Birth --}}
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <label>@lang('tr.Gender')</label>
                        <br>
                        <label class="fancy-radio">
                            <input type="radio" name="gender" value="1" required="" data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                            <span><i></i>@lang('tr.Male')</span>
                        </label>
                        <label class="fancy-radio">
                            <input type="radio" name="gender" value="2" data-parsley-multiple="gender">
                            <span><i></i>@lang('tr.Female')</span>
                        </label>
                        <p id="error-radio"></p>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Date Of Birth')</label>
                            <input type="date" id="text-input5" value="{{ old('birth_date') }}" name="birth_date" class="form-control" required="">
                        </div>
                    </div>
                </div>

                {{-- Mobiles --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Mobile')</label>
                            <input type="text" id="text-input5" value="{{ old('mobile') }}" name="mobile" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input6">@lang('tr.Order Mobile')</label>
                            <input type="text" id="text-input6" value="{{ old('order_mobile') }}" name="order_mobile" class="form-control" required="">
                        </div>
                    </div>
                </div>

                {{-- Country & City --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input5">@lang('tr.Country')</label>
                            @php($countries = \App\Models\Customer::country())
                            {!! Form::select('country', $countries, null, ['class'=>'custom-select','required'=>'']) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input6">@lang('tr.City')</label>
                            @php($cities = \App\Models\Customer::city())
                            {!! Form::select('city', $cities, null, ['class'=>'custom-select','required'=>'']) !!}
                        </div>
                    </div>
                </div>

                {{-- Address & Postal Code --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input7">@lang('tr.Address')</label>
                            <input type="text" id="text-input7" value="{{ old('address') }}" name="address" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="text-input8">@lang('tr.Postal Code')</label>
                            <input type="text" id="text-input8" value="{{ old('postal_code') }}" name="postal_code" class="form-control" required="">
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