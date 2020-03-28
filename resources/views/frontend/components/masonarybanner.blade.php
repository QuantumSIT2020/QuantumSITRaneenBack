<section class="masonory-banner o-hidden">
    <div class="container-fluid">
        <div class="row masonary-banner-block1 gutter-15">
            @php($count = 0)
            <div class="col-xl-6 col-lg-12 ">
                <div class="row">
                    
                    <div class="col-sm-6">
                        <div class="row masonary-banner-block">
                            
                            @for ($i = 0; $i < 2; $i++)
                            <div class="col-md-12">
                                <div class="masonary-banner-main">
                                    <div class="masonory-banner-img" style="">
                                        <img src="{{ asset('frontend/1.jpg') }}" style="background: rgb(207,185,185);
background: linear-gradient(180deg, rgba(207,185,185,1) 0%, rgba(178,40,39,1) 100%);"   class="img-fluid bg-img" alt="masonory-banner">
                                    </div>
                                    <div class="masonary-banner-contant p-center">
                                        @if(count($LastFourMainCategories)-1 >= $count)
                                        <h5>{{ $LastFourMainCategories[$i]->name }}</h5>
                                        @php($count = $count + 1)
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endfor
                            
                        </div>
                    </div>

                    <div class="col-sm-6 pl-3">
                        <div class="masonary-banner-main">
                            <div class="masonory-banner-img masonory-img1" style="">
                                <img src="{{ asset('frontend/5.jpg') }}"   class="img-fluid bg-img" alt="masonory-banner">
                            </div>
                            <div class="masonary-banner-contant p-center">
                                <div>
                                    @if(count($LastFourMainCategories)-1 >= $count)
                                    <h5>{{ $LastFourMainCategories[$count]->name }}</h5>
                                    @php($count = $count + 1)
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            
            
            
            <div class="col-xl-6 col-lg-12 ">
                <div class="row masonary-banner-block masonary-inner1">
                    <div class="col-md-12">
                        <div class="row masonary-banner-block2">
                            <div class="col-sm-6 pr-0">
                                <div class="masonary-banner-main">
                                    <div class="masonory-banner-img" style="">
                                        <img src="{{ asset('frontend/2.jpg') }}" style="background: rgb(207,185,185);
background: linear-gradient(180deg, rgba(207,185,185,1) 0%, rgba(178,40,39,1) 100%);"  class="img-fluid bg-img" alt="masonory-banner">
                                    </div>
                                    <div class="masonary-banner-contant p-center">
                                        @if(count($LastFourMainCategories)-1 >= $count)
                                        <h5>{{ $LastFourMainCategories[$count]->name }}</h5>
                                        @php($count = $count + 1)
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="masonary-banner-main">
                                    <div class="masonory-banner-img" style="">
                                        <img src="{{ asset('frontend/4.jpg') }}"style="background: rgb(207,185,185);
background: linear-gradient(180deg, rgba(207,185,185,1) 0%, rgba(178,40,39,1) 100%);"    class="img-fluid bg-img" alt="masonory-banner">
                                    </div>
                                    <div class="masonary-banner-contant p-center">
                                        @if(count($LastFourMainCategories)-1 >= $count)
                                        <h5>{{ $LastFourMainCategories[$count]->name }}</h5>
                                        @php($count = $count + 1)
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 pr-0">
                        <div class="masonary-banner-main">
                            <div class="masonory-banner-img" style="">
                                <img src="{{ asset('frontend/6.jpg') }}" style="background: rgb(207,185,185);
background: linear-gradient(180deg, rgba(207,185,185,1) 0%, rgba(178,40,39,1) 100%);"   alt="masonary-banner" class="img-fluid bg-img">
                            </div>
                            <div class="masonary-banner-contant p-right">
                                <div class="masonary-banner-subcontant">
                                    <div>
                                        @if(count($LastFourMainCategories)-1 >= $count)
                                        <h5>{{ $LastFourMainCategories[$count]->name }}</h5>
                                        @php($count = $count + 1)
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>