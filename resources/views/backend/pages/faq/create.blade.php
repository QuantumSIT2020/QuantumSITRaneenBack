@extends('backend.layouts.master')

@section('title',__('tr.Create New faq'))

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
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">

                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="{{route('faq')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">

                        <div class="body">
                            <form id="basic-form" style="padding:20px;" action="{{ route('store_faq') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="en_name">@lang('tr.en_name'):</label>
                                    <input type="text" class="form-control" id ="en_name"  name="en_name"  value="{{ old('en_name') }}" placeholder="@lang('tr.Enter English Name')"/>
                                </div>
                                <div class="form-group">
                                    <label for="ar_name">@lang('tr.ar_name') :</label>
                                    <input type="text" class="form-control" name="ar_name"  id ="ar_name"  value="{{ old('ar_name') }}"  placeholder="@lang('tr.Enter Arabic Name')"/>
                                </div>
                                <div class="form-group">
                                    <label for="text-input9">@lang('tr.en_description')</label>
                                    <textarea  name="en_desc">

                            </textarea>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="text-input9">@lang('tr.ar_description')</label>
                                        <textarea  name="ar_desc">

                            </textarea>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">@lang('tr.save')</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            </form>


        </div>
    </div>





@endsection
{{-- end content --}}


{{-- additional scripts --}}
@section('javascript')
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'en_desc' );
    </script>

    <script>
        CKEDITOR.replace( 'ar_desc' );
    </script>
@endsection
{{-- end additional scripts --}}
























