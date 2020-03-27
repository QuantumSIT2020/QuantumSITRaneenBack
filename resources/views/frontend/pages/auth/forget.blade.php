@extends('frontend.layouts.master')

@section('title',__('tr.Forget Pasword'))

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
                    <form class="theme-form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">@lang('tr.Email')</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="@lang('tr.Email')" required="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-normal">@lang('tr.Send Mail')</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection