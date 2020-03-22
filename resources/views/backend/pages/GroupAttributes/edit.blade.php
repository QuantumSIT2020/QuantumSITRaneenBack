@extends('backend.layouts.master')

@section('title',__('tr.Update GroupAttributes'))

{{-- additional stylesheets --}}
@section('stylesheet')

@endsection
{{-- end additional stylesheets --}}

@section('morebtn')
    <div class="col-md-6 col-sm-12 text-right hidden-xs">
        <a href="{{ route('GroupAttributes') }}" class="btn btn-sm btn-primary" title="">@lang('tr.GroupAttributes')</a>
    </div>
@endsection

{{-- content --}}
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2> @yield('title')</h2>
            </div>

            <div class="body">
                <form id="advanced-form" action="{{ route('update_GroupAttributes',$GroupAttributes->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate="" novalidate="" autocomplete="off">
                    @csrf

                    {{-- First & Last Name --}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ar_name">@lang('tr.Arabic Name')</label>
                                <input type="text" id="ar_name" value="{{ $GroupAttributes->ar_name }}" name="ar_name" class="form-control" required="" data-parsley-minlength="2">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="en_name">@lang('tr.English Name')</label>
                                <input type="text" id="en_name" value="{{ GroupAttributes->en_name }}" name="en_name" class="form-control" required="" data-parsley-minlength="2">
                            </div>
                        </div>
                    </div>




                    <button type="submit" class="btn btn-primary">@lang('tr.Save')</button>
                </form>
            </div>

        </div>
    </div>





@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
    <script src="{{ asset('backend/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/ckeditor/ckeditor.js') }}"></script><!-- Ckeditor -->
    <script src="{{ asset('backend/assets/js/pages/forms/editors.js') }}"></script>
@endsection
{{-- end additional scripts --}}