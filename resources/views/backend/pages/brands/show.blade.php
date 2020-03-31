@extends('backend.layouts.master')

@section('title',__('tr.brand Details'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <h2>@lang('tr.brand Details')</h2>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href= "{{route('brands')}}" class="btn btn-sm btn-primary btn-round" title="">@lang('tr.Back To List')</a>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>@lang('tr.Info')</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <small class="text-muted">@lang('tr.Image'): </small>

                        <div>
                            <img src="{{ URL::to('/') }}/backend/dashboard_images/brands/{{$Brand->image }}" class="img-thumbnail"  frameborder="0" style="border:0;height:500px;width: 100%;" allowfullscreen>
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
                                    <label>*@lang('tr.name'):</label>
                                    <input type="text" name="name" class="form-control m-input"  disabled  value="{{ $Brand->name}}">

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
@section('stylesheet')

@endsection
{{-- end additional scripts --}}
