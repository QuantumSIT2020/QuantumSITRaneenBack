@extends('frontend.layouts.master')

@section('title',__('tr.Login'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="login-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                <div class="theme-card">
                    <h3 class="text-center">@yield('title')</h3>
                    <form class="theme-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">@lang('tr.Email')</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="@lang('tr.Email')" required="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="review">@lang('tr.Password')</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="review" placeholder="@lang('tr.Password')" required="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-normal">@lang('tr.Login')</button>
                        <a class="float-right txt-default mt-2" href="{{ route('frontend_forget') }}" id="fgpwd">@lang('tr.Forgot your password?')</a>
                    </form>
                    <a href="{{ route('frontend_register') }}" class="txt-default pt-3 d-block">@lang('tr.Create an Account')</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection