@extends('backend.layouts.auth')

@section('title',__('tr.Login'))

@section('content')
<div class="overlaye"></div>
<div class="auth_div vivify popIn">

        

    <div class="card">
        @if(Session::has('active'))
        <div class="row">
            <div class="col-lg-12" style="margin-top: 20px; font-size: 17px; background: #b22827; padding: 8px; color: white; border-right: 20px solid white; border-left: 20px solid white; text-align: center;">
                {{ Session::get('active') }}
            </div>
        </div>
        @endif
        <div class="pattern">
            <span class="red"></span>
            <span class="indigo"></span>
            <span class="blue"></span>
            <span class="green"></span>
            <span class="orange"></span>
        </div>

        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{ asset('backend/assets/images/coin/logo.png') }}" class="logo_Login_img" alt=""></a>
        </div>

        <div class="body login_card">
            <!-- <p class="lead">Login to your account</p> -->
            <form method="POST" class="form-auth-small m-t-20" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="signin-email" class="control-label sr-only">@lang('tr.Email')</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="signin-email"  placeholder="@lang('tr.Email')">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="signin-password" class="control-label sr-only">@lang('tr.Password')</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="signin-password"  placeholder="@lang('tr.Password')">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group clearfix">
                    <label class="fancy-checkbox element-left">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>{{ __('tr.Remember Me') }}</span>
                    </label>
                    <span class="helper-text element-right ">
                         <a  href="{{ route('password.request') }}">@lang('tr.Forget Password ?')</a></span>
                </div>
                <button type="submit" class="btn btn-primary login_sumit_btn btn-block">@lang('tr.Login')</button>
                <div class="bottom">

                    {{-- <span>Don't have an account? <a class="login_Register_link" href="page-register.html">Register</a></span> --}}
                </div>
            </form>
        </div>
        <div class="pattern">
            <span class="red"></span>
            <span class="indigo"></span>
            <span class="blue"></span>
            <span class="green"></span>
            <span class="orange"></span>
        </div>
    </div>
</div>
@endsection