<div class="row">
    <div class="col-sm-12">
        <table class="table cart-table table-responsive-xs">
            <thead>
                <tr class="table-head">
                    <th scope="col">@lang('tr.Image')</th>
                    <th scope="col">@lang('tr.Name')</th>
                    <th scope="col">@lang('tr.Price')</th>
                    <th scope="col">@lang('tr.Quantity')</th>
                    <th scope="col">@lang('tr.Type')</th>
                    <th scope="col">@lang('tr.Attributes')</th>
                    <th scope="col">@lang('tr.Action')</th>
                    <th scope="col">@lang('tr.Total')</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach (Cart::content() as $item)
                @if ($item->options[0] == 'product')
                @php($product = \App\Models\Product::findOrfail($item->id))
                @else
                @php($bundle = \App\Models\bundle::findOrfail($item->id))
                @php($main_product = \App\Models\product_bundle::where('bundle_id',$bundle->id)->get()->first())
                @endif
                @php($langName = \Lang::getLocale().'_name')
                <tr>
                    @if($item->options[0] == 'product')
                    <td><a href="{{ route('frontend_product_details',$product->id) }}"><img src="{{  asset('backend/dashboard_images/Products/'.$product->product_image)   }}" alt="cart" class=" "></a></td>
                    @else
                    <td><a href="{{ route('frontend_product_details',$product->id) }}"><img src="{{  asset('backend/dashboard_images/Products/'.$main_product->MainProduct->product_image)   }}" alt="cart" class=" "></a></td>
                    @endif
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price / $item->qty }}</td>
                    <td>
                        <div class="qty-box">
                            <div class="input-group">
                                <form action="{{ route('cart_update',$item->rowId) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <input type="number" name="quantity" class="form-control input-number" value="{{ $item->qty }}" max="{{ $product->quantity }}" min="1" required>
                                    <button type="submit" class="icon"><i class="fa fa-edit" style="font-size:20px;"></i></button>
                                    </div>
                                </div>
                                </form>
                                
                            </div>
                        </div>
                    </td>
                    <td>{{ $item->options[0] }}</td>
                    
                    <td>
                        @if ($item->options[0] == 'product')

                            @for ($i = 1; $i <= count($item->options) - 1; $i++)
                                @php($attribute = \App\Models\Attributes::findOrfail($item->options[$i]))
                                <span style="background: #b22827; padding: 5px; color: white; border-radius: 10px;">{{ $attribute->$langName }}</span>
                            @endfor
                                                        
                        @else
                            -
                        @endif
                    </td>
                    
                    
                    <td><a href="{{ route('cart_remove',$item->rowId) }}" onclick="return confirm('tr.Are You Sure ?')" class="icon"><i class="ti-trash"></i></a></td>
                    <td>
                        <h2 class="td-color">EGP {{ $item->price * $item->qty }}
                            @if (($product->price * $item->qty) != $item->price)
                            <br>
                            <small class="delete_price"> EGP {{ $product->price * $item->qty  }} </small>
                            @endif
                            
                        </h2>
                    </td>
                </tr>
                @endforeach

        </table>
        <table class="table cart-table table-responsive-md">
            <tfoot>
                <tr>
                    <td>@lang('tr.Total Price') :</td>
                    <td>
                        <h2>EGP {{ Cart::subtotal() }}</h2>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row cart-buttons">
    <div class="col-12">
        <a href="{{ route('cart_checkout') }}" class="btn btn-normal ml-3">@lang('tr.Check Out')</a>
        <a href="{{ route('cart_destroy') }}" class="btn btn-normal ml-3">@lang('tr.Empty Cart')</a>
    </div>
</div>