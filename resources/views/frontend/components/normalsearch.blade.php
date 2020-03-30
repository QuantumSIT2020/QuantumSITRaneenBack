<form class="big-deal-form" action="{{ route('frontend_search') }}" method="GET">
    <div class="input-group big-deal-form">
        <div class="input-group-prepend">
            <span class="search"><i class="fa fa-search"></i></span>
        </div>

        @if (isset($_GET['searchSearch']))
        <input type="text" class="form-control searchProduct" name="searchSearch" value="{{ $_GET['searchSearch'] }}" placeholder="@lang('tr.Search a Product')">
        @else    
        <input type="text" class="form-control searchProduct" name="searchSearch" placeholder="@lang('tr.Search a Product')">
        @endif

        <div class="input-group-prepend">
            <select name="childSearch">
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
        </div>
    </div>
</form>