<section class="brand-panel section-pt-space">
    <div class="brand-panel-box">
        <div class="brand-panel-contain">
            <ul>
                <li><a href="#">top brand</a></li>
                <li><a>:</a></li>
                @foreach($brands  as  $brand)
                <li><a href="#">{{$brand->en_name}}</a></li>
                    @endforeach

            </ul>
        </div>
    </div>
</section>