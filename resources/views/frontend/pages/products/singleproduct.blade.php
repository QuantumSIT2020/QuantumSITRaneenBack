@extends('frontend.layouts.master')

@php($langName = \Lang::getLocale().'_name')

@section('title',$product->$langName)

@section('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="section-big-pt-space bg-light">
    <div class="collection-wrapper">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="product-slick no-arrow">
                        <div><img src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                        @foreach ($gallery as $image)
                            <div><img src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}"  alt="" class="img-fluid  image_zoom_cls-1"></div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-nav">
                                <div><img src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" alt="" class="img-fluid  image_zoom_cls-0"></div>
                                @foreach ($gallery as $image)
                                <div><img src="{{ asset('backend/dashboard_images/Products/'.$image->image) }}"  alt="" class="img-fluid  image_zoom_cls-1"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 rtl-text">
                    <div class="product-right">
                        <h2>{{ $product->$langName }}</h2>
                        
                        @if ($product->checkTheLatestDiscountOrHotOffer() != null)
                        
                            @if ($product->checkTheLatestDiscountOrHotOffer()->type == 'hotoffer')
                                
                                @php($start = \Carbon\Carbon::parse($product->checkTheLatestDiscountOrHotOffer()->end_date))
                                @php($end = \Carbon\Carbon::parse(date('y-m-d')))
                                @php($result = $start->diffInDays($end, false))

                                @if ($result < 0)

                                <h4><del>EGP {{ $product->price }}</del><span>{{ $product->checkTheLatestDiscountOrHotOffer()->offer }} @lang('tr.off')</span></h4>
                                @php($discount = $product->price - (($product->checkTheLatestDiscountOrHotOffer()->offer / 100) * $product->price))
                                <h3>EGP {{ $discount }}</h3>
                                <h4>@lang('tr.End Date'): {{ $product->checkTheLatestDiscountOrHotOffer()->end_date }}</h4>
                                <h4>@lang('tr.Expire In'): {{ abs($result) }}&nbsp;@lang('tr.Day(s)')</h4>

                                @else

                                <h3>EGP {{ $product->price }}</h3>
                                    
                                @endif
                            

                            @else

                            <h4><del>EGP {{ $product->price }}</del><span>{{ $product->checkTheLatestDiscountOrHotOffer()->discount }} @lang('tr.off')</span></h4>
                            @php($discount = $product->price - (($product->checkTheLatestDiscountOrHotOffer()->discount / 100) * $product->price))
                            <h3>EGP {{ $discount }}</h3>
                                
                            @endif

                        @else
                        <h3>EGP {{ $product->price }}</h3>
                        @endif


                        
                        
                        <div class="product-description border-product">
                            <span style="float:right;">
                                @if ($product->checkWishList() > 0)
                                <button data-product="{{ $product->id }}" style="border: 0;background: transparent;font-size: 30px;color: #b22827;" class="addToWishList" title="@lang('tr.Remove From Wishlist')">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                                @else
                                <button data-product="{{ $product->id }}" style="border: 0;background: transparent;font-size: 30px;color: #b22827;" class="addToWishList" title="@lang('tr.Add to Wishlist')">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                                @endif
                            </span>
                            @foreach ($attibuteGroups as $group)
                                
                                @foreach ($attributes as $attribute)

                                    @if ($attribute->attribute->attribute_group_id == $group->id)

                                    <h6 class="product-title size-text">{{ $group->$langName }}</h6>
                                    <br>
                                    <ul>
                                        <li>
                                            <input type="checkbox" name="" id="{{ $attribute->id}}">
                                            <label for="{{ $attribute->id}}">{{ $attribute->attribute->$langName }}</label>
                                        </li>

                                    </ul>
                                        
                                    @endif

                                    
                                @endforeach
                            
                            @endforeach

                            

                            
                            <h6 class="product-title">@lang('tr.Quantity')</h6>
                            <div class="qty-box">
                                <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                                    <input type="text" name="quantity" max="{{ $product->quantity }}" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                            </div>
                        </div>
                        <div class="product-buttons"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">buy now</a></div>
                        <div class="border-product">
                            <h6 class="product-title">@lang('tr.Product Details')</h6>
                            <p>{!! $product->description !!}</p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>

<section class=" tab-product  tab-exes">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="creative-card creative-inner">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">@lang('tr.Descriptions')</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">@lang('tr.Reviews')</a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-selected="false">@lang('tr.Video')</a>
                            <div class="material-border"></div>
                        </li>
                        @if (isset(Auth::user()->id))
                        <li class="nav-item"><a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">@lang('tr.Write Review')</a>
                            <div class="material-border"></div>
                        </li>
                        @endif
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <p>{!! $product->description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                            
                            @foreach ($reviews as $review)
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-1">
                                        <img src="{{ asset('frontend/user.png') }}" class="img-fluid rounded-circle " alt="testimonial" style="width:70px;">
                                    </div>

                                    
                                    <div class="col-lg-9">
                                        {{ $review->user->name }}&nbsp;
                                        @for ($i = 0; $i < $review->reviews; $i++)
                                        <i class="fa fa-star" style="color:orange"></i>
                                        @endfor
                                        
                                        <br>
                                        {{ $review->comments }}
                                    </div>
                                    
                                </div>
                                <hr>
                            @endforeach
                            
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="mt-4 text-center">
                                <a href="{{ $product->video }}" target="_blank" style="color:#b22827;font-size:15px;"><i class="fa fa-file-video-o" style="color:#b22827;font-size:50px;"></i><br><br>@lang('tr.Open Video')</a>
                            </div>
                        </div>
                        
                        @if (isset(Auth::user()->id))
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <form class="theme-form" action="{{ route('frontend_product_review',$product->id) }}" method="post">
                                <div class="form-row">
                                    <br>
                                        @csrf
                                        <div style="display:block;margin-left:auto;margin-right:auto;margin-top:10px;">
                                            <div id="rateYo"></div>
                                            <input type="hidden" name="rate_value" class="rating_val">
                                        </div>
                                        <br>
                                        <div class="col-lg-12" style="margin-top:10px;">
                                            <textarea name="comments" id="" class="form-control" placeholder="@lang('tr.Your Review')" cols="30" rows="10"></textarea>
                                        </div>
    
                                        <hr>
                                        
                                        <div class="col-md-12">
                                            <button class="btn btn-normal" type="submit">@lang('tr.Review')</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<br>


@include('frontend.components.contactbanner')

@endsection

@section('javascript')

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e817cf1047b80c5"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


<script>
    $(function () {
 
  $("#rateYo").rateYo({
         ratedFill: "#b22827",
        fullStar: true,
    onSet: function (rating, rateYoInstance) {
        $('.rating_val').val(rating);
//       alert("Rating is set to: " + rating);
    }
  });
});
</script>

@endsection
