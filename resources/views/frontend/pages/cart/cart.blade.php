@extends('frontend.layouts.master')

@section('title',__('tr.Cart'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')


@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endforeach
@endif


<section class="cart-section section-big-py-space bg-light">
    <div class="custom-container">

            @if(\Cart::count() > 0)
                <h4 class="alert alert-warning" style="text-align:center;">{{ \Cart::count()}} @lang('tr.Quantity In Your Cart')</h4><br>
                @include('frontend.pages.cart.items')
            @else
                <h4 class="alert alert-warning" style="text-align:center;">@lang('tr.No Product(s) In Your Cart')</h4><br>
            @endif

        
    </div>
</section>


@include('frontend.components.contactbanner')

@endsection