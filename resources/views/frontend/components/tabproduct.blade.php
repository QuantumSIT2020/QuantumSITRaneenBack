<section class="section-pt-space">
    <div class="tab-product-main">
        <div class="tab-prodcut-contain">
            <ul class="tabs tab-title">
                @foreach ($MainCategories as $main)
                <li><a href="tab-{{$main->id}}">{{ $main->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
