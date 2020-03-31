<div class="nav-desk">
    <ul class="nav-cat title-font">

        @foreach ($MainCategories as $main)

        <li class="parentlevel"> <img src="{{ asset('backend/dashboard_images/MainCategory/'.$main->main_image) }} " alt="catergory-product"> <a>{{ $main->name }}</a>
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <ul class="menulevel">

                @foreach ($ChildCategories as $child)
                    
                    @if ($child->main_category_id == $main->id)

                        <li class="secondparentlevel"> <img src="{{ asset('backend/dashboard_images/ChildCategory/'.$child->child_image) }}" alt="catergory-product"> <a>{{ $child->name }}</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            
                            <ul class="secondmenulevel">
                                
                                @foreach ($subCategories as $sub)

                                @if ($sub->child_category_id == $child->id)
                                
                                <li> <img src="{{ asset('backend/dashboard_images/SubCategory/'.$sub->sub_image) }}" alt="catergory-product"> <a>{{ $sub->name }}</a> </li>
                                    
                                @endif

                                    
                                @endforeach
                                
                            </ul>

                        </li>
                    
                        
                    @endif

                @endforeach

                
            </ul>
        </li>
            
        @endforeach

        

    </ul>
</div>