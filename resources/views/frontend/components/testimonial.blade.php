<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slide-1 no-arrow">

                    @foreach ($testimonials as $testimonial)

                    <div>
                        <div class="testimonial-contain">
                            <div class="media">
                                <div class="testimonial-img">
                                    <img src="{{ asset('backend/dashboard_images/testimonials/'.$testimonial->image) }}" class="img-fluid rounded-circle " alt="testimonial">
                                </div>
                                <div class="media-body">
                                    <h5>{{ $testimonial->name }}</h5>
                                    <p>{!! substr($testimonial->description,0,245) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</section>