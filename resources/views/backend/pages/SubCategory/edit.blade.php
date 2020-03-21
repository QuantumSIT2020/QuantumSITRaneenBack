@extends('backend.layouts.master')

@section('title',__('tr.Update Sub Category'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

{{-- content --}}
@section('content')

    <div class="col-lg-12">
        <div class="card">

            <div class="col-md-6 col-sm-12">
                <h2>@yield('title')</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right hidden-xs">
                <a href="{{route('SubCategory')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
            </div>
            <div class="body">
                <form style="padding:20px;" action="{{ route('update_SubCategory',$subCategory_data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group row">
                        <label  class="col-sm-12 col-md-2 col-form-label" for="main_category_id">@lang('tr.main_category')</label>
                        <div class="col-sm-12 col-md-10">
                            <select name="child_category_id" id="child_category_id" class="custom-select" required>
                                <option value="">@lang('tr.Select sub_category')</option>
                                @foreach ($ChildCategories as $ChildCategory)
                                    @if($subCategory_data->child_category_id == $ChildCategory->id)
                                        <option value="{{ $ChildCategory->id }}" selected>{{ $ChildCategory->name }}</option>
                                    @else
                                        <option value="{{ $ChildCategory->id }}">{{ $ChildCategory->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.en_name')</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="en_name" id="en_name" type="text" value="{{ $subCategory_data->en_name }}" >
                        </div>

                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.ar_name')</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="ar_name" id="ar_name" type="text" value="{{ $subCategory_data->ar_name }}" >
                        </div>

                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.en_description')</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="en_desc" id="en_desc" cols="30" rows="10" class="form-control m-input" value="">{{ $subCategory_data->en_desc}}</textarea>
                        </div>

                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.ar_description')</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="ar_desc" id="ar_desc" cols="30" rows="10" class="form-control m-input" value="">{{ $subCategory_data->ar_desc }}</textarea>

                        </div>

                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.Select another Image')</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" name="sub_image" id="file" aria-label="File browser example"  onchange="readURL(this);"  />
                            <img src="{{ URL::to('/') }}/backend/dashboard_images/SubCategory/{{ $subCategory_data->sub_image }}" class="img-thumbnail" width="100" />

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

