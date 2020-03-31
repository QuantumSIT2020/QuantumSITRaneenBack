@extends('backend.layouts.master')

@section('title',__('tr.Update page'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2> @yield('title')</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right hidden-xs">
                <a href= "{{route('brands')}}" class="btn btn-sm btn-primary btn-round" title="">@lang('tr.Back To List')</a>
            </div>

            <div class="body">
                <form style="padding:20px;" action="{{ route('update_brands',$Brand->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.name')</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="name" id="name" type="text" value="{{ $Brand->name }}" >
                        </div>

                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.Select another Image')</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" name="image" id="file" aria-label="File browser example"  onchange="readURL(this);"  />
                            <img src="{{ URL::to('/') }}/backend/dashboard_images/brands/{{ $Brand->image }}" class="img-thumbnail" width="100" />

                            <img id="blah" src="#" alt="@lang('tr.your image')" />
                            <span class="file-custom"></span>
                        </div>

                    </div>

                    <hr>


                    <div class="form-group row">
                        <input type="submit" value="@lang('tr.Update')" class="btn btn-primary col-sm-12 col-md-2">
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('stylesheet')

@endsection
{{-- end additional scripts --}}

