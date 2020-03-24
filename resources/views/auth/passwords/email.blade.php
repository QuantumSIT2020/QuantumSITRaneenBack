@extends('backend.layouts.auth')

@section('title',__('tr.Reset Password'))

@section('content')
<div class="overlaye"></div>
        <div class="auth_div vivify popIn">

            <div class="card">
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
                    <p>@lang('tr.Type email to recover password').</p>
                    <form class="form-auth-small" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="signup-password" placeholder="@lang('tr.Email')" value="{{ old('email') }}" required name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary login_sumit_btn btn-block">@lang('tr.Send Mail')</button>
                        <div class="bottom">
                            <span>@lang('tr.Know your password ?') <a class="login_Register_link" href="{{ url('/login') }}">@lang('tr.Login')</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection