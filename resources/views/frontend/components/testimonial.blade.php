<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slide-1 no-arrow">

                    @foreach ($allReviews as $review)

                    <div>
                        <div class="testimonial-contain">
                            <div class="media">
                                <div class="testimonial-img">
                                    <img src="{{ asset('frontend/user.png') }}" class="img-fluid rounded-circle " alt="testimonial">
                                </div>
                                <div class="media-body">
                                    <h5>{{ $review->user->name }}</h5>
                                    <p>{{ $review->comments }}</p>
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