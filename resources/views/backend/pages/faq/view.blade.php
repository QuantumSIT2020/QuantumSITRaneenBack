@extends('frontend.layouts.master')

@section('title',__('tr.FAQ'))

@section('content')

@section('breads')
    <li><i class="fa fa-angle-double-right"></i></li>
    <li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')



<!--section start-->
<section class="faq-section section-big-py-space" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion theme-accordion" id="accordionExample">
                    @foreach($Faqs as $faq)
                    <div class="card" id="headingOne">
                        <div class="card-header" id="headingOne">

                            <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{$faq->name}}</button></h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>{!! $faq->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->






@endsection