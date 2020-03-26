@extends('backend.layouts.master')

@section('title',__('tr.faq Details'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <h2>@lang('tr.Page Details')</h2>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href= "{{route('faq')}}" class="btn btn-sm btn-primary btn-round" title="">@lang('tr.Back To List')</a>
                </div>
            </div>
        </div>
        <div class="row clearfix">


            <div class="col-xl-12 col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h2>@lang('tr.Basic Information')</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>*@lang('tr.en_name'):</label>
                                    <input type="text" name="en_name" class="form-control m-input"  disabled  value="{{ $Faq->en_name}}">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>*@lang('tr.ar_name'):</label>
                                    <input type="text" name="ar_name" class="form-control m-input"  disabled  value="{{ $Faq->ar_name}}">

                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>@lang('tr.en_description'):</label>

                                    <textarea name="en_desc" id="en_desc" cols="30" rows="10" class="form-control m-input" disabled >
                                                       {{ $Faq->en_desc }}</textarea>                                    </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>@lang('tr.ar_description'):</label>

                                    <textarea name="ar_desc" id="ar_desc" cols="30" rows="10" class="form-control m-input" disabled >
                                                       {{ $Faq->ar_desc }}</textarea>                                    </div>
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

@endsection
{{-- end additional scripts --}}
