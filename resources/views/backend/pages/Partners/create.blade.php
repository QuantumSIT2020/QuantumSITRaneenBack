@extends('backend.layouts.master')

@section('title',__('tr.Create New Branches'))

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
                        <a href="{{route('partners')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">

                        <div class="body">
                            <form id="basic-form" style="padding:20px;" action="{{ route('store_partners') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="col-lg-12">@lang('tr.Name')</label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="@lang('tr.Name')"  class="form-control"  name="name" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-12">@lang('tr.Mobile')</label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="@lang('tr.Mobile')"  class="form-control"  name="mobile" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-12">@lang('tr.Address')</label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="@lang('tr.Address')"  class="form-control"  name="address" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-12">@lang('tr.Logo')</label>
                                    <div class="col-md-8">
                                        <input type="file" id="file"  class="form-control"  name="partners_logo" required/>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">@lang('tr.Save')</button>
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
@section('stylesheet')

@endsection
{{-- end additional scripts --}}

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).siblings("img").attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>















