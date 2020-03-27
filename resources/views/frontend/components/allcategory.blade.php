<div class="nav-desk">
    <ul class="nav-cat title-font">
    @foreach($MainCategories as $main)
       @if($main->countChilds($main->id)>0)
                <li class="parentlevel"> <img src="{{ asset('backend/dashboard_images/MainCategory/'.$main->main_image) }}" alt="catergory-product"> <a>{{$main->name}}</a>
                    <i class="fa fa-angle-right pl-5" aria-hidden="true"></i>

                    <ul class="menulevel">

                        @foreach($ChildCategories as $child)
                            @if($child->countSubCategory($child->id)>0)
                                <li class="parentlevel"> <img src="{{ asset('backend/dashboard_images/ChildCategory/'.$child->child_image) }}" alt="catergory-product"> <a>{{$child->name}}</a>
                                    <i class="fa fa-angle-right pl-5" aria-hidden="true"></i>

                                    <ul class="menulevel">
                                        @foreach($subCategories as $sub)
                                            @if($child->id == $sub->child_category_id)
                                                <li> <img src="{{ asset('backend/dashboard_images/SubCategory/'.$sub->sub_image) }} " alt="catergory-product"> <a>{{$sub->name}}</a> </li>


                                            @endif

                                            @endforeach

                                    </ul>

                                </li>
                                @else
                                <li> <img src="{{ asset('backend/dashboard_images/ChildCategory/'.$child->child_image) }}" alt="catergory-product"> <a>{{$child->name}}</a> </li>

                            @endif

                            @endforeach
                    </ul>

                </li>
           @else
                <li> <img src="{{ asset('backend/dashboard_images/MainCategory/'.$main->main_image) }} " alt="catergory-product"> <a>{{$main->name}}</a></li>
           @endif
    @endforeach

    </ul>
</div>