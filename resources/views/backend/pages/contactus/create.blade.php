@extends('backend.layouts.master')

@section('title',__('tr.Create contact us'))

{{-- additional stylesheets --}}
@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
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
                        <a href="{{route('contactus')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">

                        <div class="body">
                            <form id="basic-form" style="padding:20px;" action="{{ route('store_contactus') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">@lang('tr.name'):</label>
                                    <input type="text" class="form-control" id ="name"  name="name"  value="{{ old('name') }}" placeholder="@lang('tr.Enter Name')"/>
                                </div>

                                <div class="form-group">
                                    <label for="email">@lang('tr.email'):</label>
                                    <input type="email" class="form-control" id ="email"  name="email"  value="{{ old('email') }}" placeholder="@lang('tr.Enter email')"/>
                                </div>


                                <div class="form-group">
                                    <label for="text-input9">@lang('tr.message')</label>
                                    <textarea  name="message">

                            </textarea>
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
        CKEDITOR.replace( 'message' );
    </script>


@endsection
{{-- end additional scripts --}}
























