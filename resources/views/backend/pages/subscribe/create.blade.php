@extends('backend.layouts.master')

@section('title',__('tr.Create subscribe'))

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
                        <a href="{{route('Subscribe')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">

                        <div class="body">
                            <form id="basic-form" style="padding:20px;" action="{{ route('store_Subscribe') }}" method="post" enctype="multipart/form-data">
                                @csrf



                                <div class="form-group">
                                    <label for="email">@lang('tr.email'):</label>
                                    <input type="email" class="form-control" id ="email"  name="email"  value="{{ old('email') }}" placeholder="@lang('tr.Enter email')"/>
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























