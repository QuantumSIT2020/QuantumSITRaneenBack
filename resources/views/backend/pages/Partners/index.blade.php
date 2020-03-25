@extends('backend.layouts.master')

@section('title',__('tr.Partners'))

{{-- additional stylesheets --}}
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/animate-css/vivify.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/light-gallery/css/lightgallery.css') }}">
@endsection
{{-- end additional stylesheets --}}


@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('create_partners') }}" class="btn btn-sm btn-info" title=""><i class="fa fa-plus"></i>@lang('tr.Create New Partner')</a>
    </div>
@endsection

{{-- content --}}
@section('content')


    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>@yield('title')</h2>
                <ul class="header-dropdown dropdown">

                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                </ul>
            </div>
            <div class="body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <h4>@lang('tr.Partners')</h4><hr>
                                <div id="lightgallery" class="row clearfix lightGallery">
                                    @foreach ($partners as $partner)
                                    <div id="lightgallery" class="row clearfix lightGallery">
                                        <div class="col-lg-3 col-md-6 m-b-30">
                                            <a class="light-link" href="{{ asset('backend/dashboard_images/Partners/'.$partner->partners_logo) }}"><img style="width:800px;height:200px;" class="img-fluid rounded" src="{{ asset('backend/dashboard_images/Partners/'.$partner->partners_logo) }}" alt=""></a>
                                            <a href="{{ route('delete_partners',$partner->id) }}" onclick="return confirm('tr.Are You Sure?')" class="btn btn-danger btn-block" style="margin-top:10px;">@lang('tr.Delete')</a>
                                        </div>
                                        
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>



            </div>
        </div>
    </div>


@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
<script src="{{ asset('backend/assets/bundles/lightgallery.bundle.js') }}"></script><!-- Light Gallery Plugin Js --> 
<script src="{{ asset('backend/assets/js/pages/medias/image-gallery.js') }}"></script>
@endsection
{{-- end additional scripts --}}


