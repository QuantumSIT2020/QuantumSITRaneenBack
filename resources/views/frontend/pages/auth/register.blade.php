@extends('frontend.layouts.master')

@section('title',__('tr.Register'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        @if ($errors->any())
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="theme-card">
                <div class="col-lg-12">
                    <h2>@lang('tr.Please Fix Errors')</h2>
                    <hr>
                        @foreach ($errors->all() as $error)
                            <h6 style="color:#e74c3c;">{{ $error }}</h6>
                        @endforeach 
                </div>
            </div>
        </div>
    </div>
    @endif
    
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="theme-card">
                    <h3 class="text-center">@yield('title')</h3>
                    <form class="theme-form" method="POST" action="{{ route('frontend_register_post') }}">
                        @csrf
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
                                {!! Form::select('gender', [''=>__('tr.Select Gender'),'1'=>__('tr.Male'),'2'=>__('tr.Female')], null, ['class'=>'form-control','required'=>'','style'=>'padding: 12px 25px;border-radius: 0;height: 50px;']) !!}
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
                                    {!! Form::select('country', $countries, null, ['class'=>'form-control','required'=>'','style'=>'padding: 12px 25px;border-radius: 0;height: 50px;']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="text-input6">@lang('tr.City')</label>
                                    @php($cities = \App\Models\Customer::city())
                                    {!! Form::select('city', $cities, null, ['class'=>'form-control','required'=>'','style'=>'padding: 12px 25px;border-radius: 0;height: 50px;']) !!}
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

                        <button type="submit" class="btn btn-normal">@lang('tr.Register')</button><hr>
                        <div class="form-row">
                            <div class="col-md-12 ">
                                <p >@lang('tr.Have you already account?') <a href="{{ route('frontend_login') }}" class="txt-default">@lang('tr.Login')</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection