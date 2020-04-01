<footer class="footer-2">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="footer-main-contian">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 pr-lg-0">
                            <div class="footer-left">
                                <div class="footer-logo">
                                    <img src="{{ asset('frontend/assets/images/layout-2/logo/logo-ranen.png') }}" class="img-fluid  " alt="logo">
                                </div>
                                <div class="footer-detail">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                                    <ul class="paymant-bottom">
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/images/layout-1/pay/1.png') }}" class="img-fluid" alt="pay"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/images/layout-1/pay/2.png') }}" class="img-fluid" alt="pay"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/images/layout-1/pay/3.png') }}" class="img-fluid" alt="pay"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/images/layout-1/pay/4.png') }}" class="img-fluid" alt="pay"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="{{ asset('frontend/assets/images/layout-1/pay/5.png') }}" class="img-fluid" alt="pay"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 p-l-md-0">
                            <div class="footer-right">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="subscribe-section">
                                            <div class="row">
                                                <div class="col-md-5 pr-lg-0">
                                                    <div class="subscribe-block">
                                                        <div class="subscrib-contant ">
                                                            <h4>subscribe to newsletter</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 p-l-md-0">
                                                    <form action="{{ route('frontend_send_subscribe') }}" class="theme-form theme-form_2" method="POST">
                                                        @csrf


                                                    <div class="subscribe-block">
                                                        <div class="subscrib-contant">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                        class="fa fa-envelope-o"></i></span>
                                                                </div>
{{--                                                                <input type="email"  id="email" class="form-control" placeholder="your email">--}}
                                                                <input type="email"  id="email" class="form-control" placeholder="@lang('tr.ENTER YOUR EMAIL')" name="email" required="">

                                                                <div class="input-group-prepend">

                                                                    <button class="btn btn-normal" type="submit">@lang('tr.subscribe')</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class=account-right>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="footer-box">
                                                        <div class="footer-title">
                                                            <h5>my account</h5>
                                                        </div>
                                                        <div class="footer-contant">
                                                            <ul>
                                                                <li><a href="#">about us</a></li>
                                                                <li><a href="#">contact us</a></li>
                                                                <li><a href="#">terms & conditions</a></li>
{{--                                                                <li><a href="#">returns & exchanges</a></li>--}}
{{--                                                                <li><a href="#">shipping & delivery</a></li>--}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="footer-box">
                                                        <div class="footer-title">
                                                            <h5>quick link</h5>
                                                        </div>
                                                        <div class="footer-contant">
                                                            <ul>
                                                                <li><a href="#">store location</a></li>
                                                                <li><a href="#"> my account</a></li>
                                                                <li><a href="#"> orders tracking</a></li>
                                                                <li><a href="#"> size guide</a></li>
                                                                <li><a href="{{route('viewfaq')}}">FAQ </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="footer-box footer-contact-box">
                                                        <div class="footer-title">
                                                            <h5>contact us</h5>
                                                        </div>
                                                        <div class="footer-contant">
                                                            <ul class="contact-list">
                                                                <li><i class="fa fa-map-marker"></i><span>big deal
                                                                store demo store <br> <span>
                                                                    {{ \App\Models\Soicalmedia::findOrfail(1)->address }}</span></span>
                                                                </li>
                                                                <li><i class="fa fa-phone"></i><span>call us:
                                                                {{ \App\Models\Soicalmedia::findOrfail(1)->phone_number }}</span></li>
                                                                <li><i class="fa fa-envelope-o"></i><span>email us:
                                                                {{ \App\Models\Soicalmedia::findOrfail(1)->gmail }}</span></li>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-link-block  bg-transparent">
        <div class="container">
            <div class="row">
                <div class="app-link-bloc-contain app-link-bloc-contain-1">
                    <div class="app-item-group">
                        <div class="app-item">
                            <img src="{{ asset('frontend/assets/images/layout-1/app/1.png') }}" class="img-fluid" alt="app-banner">
                        </div>
                        <div class="app-item">
                            <img src="{{ asset('frontend/assets/images/layout-1/app/2.png') }}" class="img-fluid" alt="app-banner">
                        </div>
                    </div>
                    <div class="app-item-group ">
                        <div class="sosiyal-block">
                            <h6>follow us</h6>
                            <ul class="sosiyal">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sub-footer-contain">
                        <p><span> {{ date('Y') }} </span>copy right by Quntumist company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>