<li class="mobile-search"><a href="#"><i class="icon-search"></i></a>
    <div class="search-overlay">
        <div>
            <span class="close-mobile-search">×</span>
            <div class="overlay-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="{{ route('frontend_search') }}" method="GET">
                                <select name="childSearch" class="form-control">
                                    @foreach ($childCategorySearch as $child)
                                        @if (isset($_GET['childSearch']))
                                            @if ($_GET['childSearch'] == $child->id)
                                                <option value="{{ $child->id }}" selected>{{ $child->name }}</option>
                                            @else
                                                <option value="{{ $child->id }}">{{ $child->name }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <br>
                                <div class="form-group">
                                    @if (isset($_GET['searchSearch']))
                                    <input type="text" name="searchSearch" class="form-control" value="{{ $_GET['searchSearch'] }}" id="exampleInputPassword1" placeholder="@lang('tr.Search a Product')"></div>
                                    @else 
                                    <input type="text" name="searchSearch" class="form-control" id="exampleInputPassword1" placeholder="@lang('tr.Search a Product')"></div>
                                    @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>

