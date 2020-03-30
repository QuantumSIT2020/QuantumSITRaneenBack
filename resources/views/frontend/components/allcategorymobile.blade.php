<div class="sm-nav-block">
    <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
    <ul class="nav-slide">
        <li>
            <div class="nav-sm-back">
                @lang('tr.Back') <i class="fa fa-angle-right pl-2"></i>
            </div>
        </li>

        @foreach ($MainCategoriesMenu as $main)
            <li><a href="{{ route('frontend_childcategory',$main->id) }}">{{ $main->name }}</a></li>
        @endforeach

    </ul>
</div>