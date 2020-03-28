<div id="wishlist_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>@lang('tr.my wishlist')</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
                @php($wishListTotal = 0)
                @php($langName = \Lang::getLocale().'_name')
                
                @if (isset(Auth::user()->id))
                @foreach ($user_wishlists as $wish)
                @if ($wish->user_id == Auth::user()->id)
                @php($getDiscount = \App\Models\Product::checkDiscount($wish->Product->id))
                <li>
                    <div class="media">
                        <a href="#">
                            <img alt="" class="mr-3" src="{{ asset('backend/dashboard_images/Products/'.$wish->Product->product_image) }}">
                        </a>
                        <div class="media-body">
                            <a href="#">
                                <h4>{{ $wish->Product->$langName }}</h4>
                            </a>
                            <h4>
                                @if ($getDiscount == null)
                                <div class="price" style="margin-left:0;">
                                    @php($wishListTotal = $wishListTotal + $wish->Product->price)
                                    <span>EGP {{ $wish->Product->price }}</span>
                                </div>
                                @else
                                <div class="price">
                                    <div class="price">
                                        @php($discount = $wish->Product->price - (($getDiscount->discount / 100) * $wish->Product->price))
                                        @php($wishListTotal = $wishListTotal + $discount)
                                        <span><span style="text-decoration: line-through;">{{ $wish->Product->price }}</span> EGP {{ $discount }}</span>
                                    </div>
                                </div>
                                @endif
                                
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                    
                @endif
                
                @endforeach

                

                @endif
                

                
            </ul>
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>@lang('tr.subtotal') : <span>EGP {{ $wishListTotal }}</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="wishlist.html" class="btn btn-normal btn-block  view-cart">view wihslist</a>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="#" class="btn btn-normal btn-block  view-cart">Add all to cart </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>