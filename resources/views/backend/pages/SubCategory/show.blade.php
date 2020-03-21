@extends('backend.layouts.master')

@section('title',__('tr.ChildCategory Details'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">

                <div class="col-md-6 col-sm-12">
                    <h2>@lang('tr.MainCategory Details')</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="{{route('SubCategory')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card social">
                    <div class="profile-header d-flex justify-content-between justify-content-center">
                        <div class="d-flex">
                            <div class="mr-3">
                                <img src="{{ URL::to('/') }}/backend/dashboard_images/ChildCategory/{{$subCategory_data->ChildCategory->child_image }}" class="rounded" alt="">
                            </div>
                            <div class="details">
                                <h5 class="mb-0">        MainCategory::         {{ $subCategory_data->ChildCategory->MainCategory->en_name}}</h5>
                                <span class="text-light">ChildCategory::        {{ $subCategory_data->ChildCategory->en_name}}</span>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>@lang('tr.Info')</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <small class="text-muted">@lang('tr.Sub Image'): </small>

                        <div>
                            <img src="{{ URL::to('/') }}/backend/dashboard_images/SubCategory/{{$subCategory_data->sub_image }}" class="img-thumbnail"  frameborder="0" style="border:0;height:500px;width: 100%;" allowfullscreen>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-7">
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
                                    <input type="text" name="en_name" class="form-control m-input"  disabled  value="{{ $subCategory_data->en_name}}">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>*@lang('tr.ar_name'):</label>
                                    <input type="text" name="ar_name" class="form-control m-input"  disabled  value="{{ $subCategory_data->ar_name}}">

                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>@lang('tr.en_description'):</label>

                                    <textarea name="en_desc" id="en_desc" cols="30" rows="10" class="form-control m-input" disabled >
                                                       {{ $subCategory_data->en_desc }}</textarea>                                    </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>@lang('tr.ar_description'):</label>

                                    <textarea name="ar_desc" id="ar_desc" cols="30" rows="10" class="form-control m-input" disabled >
                                                       {{ $subCategory_data->ar_desc }}</textarea>                                    </div>
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
@section('stylesheet')

@endsection
{{-- end additional scripts --}}

