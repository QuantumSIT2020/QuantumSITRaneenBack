<section class="section-py-space ratio_square product">
    <div class="custom-container">
        <div class="row">
            <div class="col pr-0">
                <div class="theme-tab product no-arrow">
                    <div class="tab-content-cls ">

                        @foreach ($MainCategories as $main)
                        <div id="tab-{{ $main->id }}" class="tab-content product">
                            <div class="product-slide-6 product-m no-arrow">
                                
                                @foreach ($ChildCategories as $child)

                                @if ($child->main_category_id == $main->id)

                                <div>
                                    <a href="{{ route('frontend_brandcategory',$child->id) }}">
                                        <div class="product-box">
                                            <div class="product-imgbox">
                                                <div class="product-front">
                                                    <img src="{{ asset('backend/dashboard_images/ChildCategory/'.$child->child_image) }}" style="width:300px;height:300px;" class="img-fluid  " alt="product">
                                                </div>
                                                <div class="product-back">
                                                    <img src="{{ asset('backend/dashboard_images/ChildCategory/'.$child->child_image) }}" style="width:300px;height:300px;" class="img-fluid  " alt="product">
                                                </div>
                                            </div>
                                            <div class="product-detail detail-center detail-inverse">
                                                <div class="detail-title" style="background: #b22827; width: 100%; padding: 10px; text-align: center; color: white; text-transform: uppercase;">
                                                    {{ $child->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                    
                                @endif

                                @endforeach
                                
                                
                            </div>
                        </div>
                        @endforeach

                        
                        

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
