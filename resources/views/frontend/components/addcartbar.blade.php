<div id="cart_side" class=" add_to_cart bottom ">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>@lang('tr.My Cart')</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
                
                @foreach (Cart::content() as $item)

                @if ($item->options[0] == 'product')
                @php($product = \App\Models\Product::findOrfail($item->id))
                @else
                @php($bundle = \App\Models\bundle::findOrfail($item->id))
                @php($main_product = \App\Models\product_bundle::where('bundle_id',$bundle->id)->get()->first())
                @endif
                @php($langName = \Lang::getLocale().'_name')

                <li>
                    <div class="media">
                        @if ($item->options[0] == 'product')
                        <a href="{{ route('frontend_product_details',$product->id) }}">
                            <img alt="" class="mr-3" src="{{  asset('backend/dashboard_images/Products/'.$product->product_image)   }}">
                        </a>
                        
                        
                        <div class="media-body">
                            <a href="{{ route('frontend_product_details',$product->id) }}">
                                <p>{{ $item->name }}</p>
                            </a>
                            <p>
                                <span>{{  $item->qty }} x EGP {{ $item->price }}</span>
                                <p>@lang('tr.Product')</p>
                            </p>
                        </div>

                        @else

                        <a href="{{ route('frontend_bundledetails',$bundle->id) }}">
                            <img alt="" class="mr-3" src="{{  asset('backend/dashboard_images/Products/'.$main_product->MainProduct->product_image)   }}">
                        </a>
                        
                        
                        <div class="media-body">
                            <a href="{{ route('frontend_product_details',$product->id) }}">
                                <p>{{ $item->name }}</p>
                            </a>
                            <p>
                                <span>{{  $item->qty }} x EGP {{ $item->price }}</span>
                                <p>@lang('tr.Bundle')</p>
                            </p>
                        </div>

                        @endif
                    </div>
                    <div class="close-circle">
                        <a href="{{ route('cart_remove',$item->rowId) }}" onclick="return confirm('tr.Are You Sure ?')"><i class="ti-trash"></i></a>
                    </div>
                </li>

                @endforeach

            </ul>
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>@lang('tr.Sub Total') : <span>EGP {{ Cart::subtotal() }}</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ route('cart_index') }}" class="btn btn-normal btn-xs view-cart">@lang('tr.View Cart')</a>
                        <a href="#" class="btn btn-normal btn-xs checkout">checkout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>