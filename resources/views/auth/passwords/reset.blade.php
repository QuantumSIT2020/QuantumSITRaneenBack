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
                    <form class="form-auth-small" action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="signup-password" placeholder="@lang('tr.Email')" value="{{ $email ?? old('email') }}" required name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="signup-password" placeholder="@lang('tr.Password')" autocomplete="new-password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('tr.Confirm Password')" id="signup-password" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary login_sumit_btn btn-block">@lang('tr.Reset Password')</button>
                        
                    </form>
                </div>
            </div>
        </div>
@endsection