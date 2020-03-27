<script>
    $(document).ready(function() {
    $('#ajaxData').hide();
    var productsHtml = '';
    brandArray = [];
    brands = [];
    var brandFilterUrl = '{{ route("frontend_brandfilter",["id"=>"#id"]) }}';
    brandFilterUrl = brandFilterUrl.replace('#id','{{ $child_category_id }}');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.brandCheck').on('click', function() {
        if ($(this).is(':checked')) {
            $("input:checkbox[name=brands]:checked").each(function() {
                brandArray.push($(this).val());
            });
            $.each(brandArray, function(i, el) {
                if ($.inArray(el, brands) === -1) brands.push(el);
            });
        } else {
            var index = brands.indexOf($(this).val());
            brands.splice(index, 1);
        }

        jQuery.ajax({
            url: brandFilterUrl,
            method: 'get',
            data: {
                brand: brands,
            },
            success: function(result) {
                $('#normalData').fadeOut();
                console.log(result.products);
                $.each(result.products, function(index, value) {
                    productsHtml += '';
                
                    @php($getReview = \App\Models\Product::getReview($product->id))
                    @php($getDiscount = \App\Models\Product::checkDiscount($product->id))

                    <div class="col-xl-3 col-md-4 col-6 col-grid-box">
                        <div class="product">
                            <div class="product-box">
                                <div class="product-imgbox">
                                    <a href="product-details-bundels.html">
                                        <div class="product-front">
                                            <img style="width: 768px;height: 250px;" src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" class="img-fluid  " alt="product">
                                        </div>
                                        <div class="product-back">
                                            <img style="width: 768px;height: 250px;" src="{{ asset('backend/dashboard_images/Products/'.$product->product_image) }}" class="img-fluid  " alt="product">
                                        </div>
                                    </a>
                                </div>
                                <div class="product-detail detail-center ">
                                    <div class="detail-title">
                                        <div class="detail-left">
                                            <div>
                                                @for ($i = 0; $i < round( $getReview); $i++)
                                                <i class="fa fa-star" style="color:orange"></i>
                                                @endfor
                                                ({{ round( $getReview).'/5' }})
                                                
                                            </div>
                                            <a href="">
                                                <h6 class="price-title">
                                                    {{ $product->$langName }}
                                                </h6>
                                            </a>
                                        </div>
                                        <div class="detail-right">
                                            
                                            @if ($getDiscount == null)
                                            <div class="price" style="margin-left:0;">
                                                EGP {{ $product->price }}
                                            </div>
                                            @else
                                            <div class="check-price">
                                                EGP {{ $product->price }}
                                            </div>
                                            <div class="price">
                                                <div class="price">
                                                    @php($discount = $product->price - (($getDiscount->discount / 100) * $product->price))
                                                    EGP {{ $discount }}
                                                </div>
                                            </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="icon-detail">
                                        <button data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                            <i class="ti-bag" ></i>
                                        </button>
                                        <a href="javascript:void(0)" title="Add to Wishlist">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                            <i class="ti-search" aria-hidden="true"></i>
                                        </a>
                                        <a href="compare.html" title="Compare">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        


                });


                $('#ajaxData').fadeIn();
            }
        });

    });


});
</script>