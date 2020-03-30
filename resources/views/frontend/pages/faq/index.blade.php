@extends('frontend.layouts.master')

@section('title',__('tr.FAQ'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="faq-section section-big-py-space" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion theme-accordion" id="accordionExample">
                    
                    @php($langName = \Lang::getLocale().'_name')
                    @php($langDesc = \Lang::getLocale().'_desc')

                    @foreach ($faqs as $faq)

                    <div class="card" id="headingOne">
                        <div class="card-header" id="heading{{ $faq->id }}">
                            <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">{{ $faq->$langName }}</button></h5>
                        </div>
                        <div id="collapse{{ $faq->id }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>{{ $faq->$langDesc }}</p>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.components.contactbanner')

@endsection

