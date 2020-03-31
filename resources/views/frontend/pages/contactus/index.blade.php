@extends('frontend.layouts.master')

@section('title',__('tr.Contact Us'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="contact-page section-big-py-space">
    <div class="custom-container">
        <div class="title6 ">
            <h4> @lang('tr.Get Our Branches On Map') </h4>
        </div>
        <div class="row section-big-pb-space">
            <div class="col-xl-6  col-lg-6 col-md-6 col-sm-12 ">

                <form action="{{ route('frontend_send_contact') }}" class="theme-form theme-form_2" method="POST">
                    @csrf

                    <div class="form-row">
                        <h3 class="col-md-12" style="margin-bottom: 30px;"> @lang('tr.Get in touch with us') </h3>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">@lang('tr.Name')</label>
                                <input type="text" class="form-control" id="name" placeholder="@lang('tr.Name')" name="name" required="">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">@lang('tr.Email')</label>
                                <input type="email" class="form-control" id="email" placeholder="@lang('tr.Email')" name="email" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <label for="review">@lang('tr.Write Your Message')</label>
                                <textarea class="form-control" placeholder="@lang('tr.Write Your Message')" id="exampleFormControlTextarea1" name="message" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-normal" type="submit">@lang('tr.Send Your Message')</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-xl-6  col-lg-6 col-md-6 col-sm-12 map" style="">
                <div class="theme-card theme-form_2 " style="height: 100% !important;">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1605.811957341231!2d25.45976406005396!3d36.3940974010114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1550912388321" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>
</section>
<!--Section ends-->

<!--payment offer start -->
<section class="section-pt-space" style="padding-bottom: 50px;">
    <div class="custom-container">
        <div class="title6 ">
            <h4> @lang('tr.Branches') </h4>
        </div>
        <div class="row">
            <div class="col-12 pr-0">
                <div class="slide-5 no-arrow">
                    <div>
                        <div class="paymant-offer-mian paymant-offer-mian_2">
                            @foreach ($branches as $branch)

                            <div>
                                <img src="{{ asset('backend/dashboard_images/Partners/'.$branch->partners_logo) }}" alt="branches name" class="img-fluid" style="width: 30%;">
                                <h3> <b> @lang('tr.Branch') </b> {{ $branch->name }}</h3>
                                <h4> {{ $branch->address }}
                                    </span>
                                </h4>
                                <div class="payment-cod">@lang('tr.Phone') <span> &nbsp; : &nbsp; {{ $branch->mobile }} </span></div>
                            </div>
                                
                            @endforeach
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection
