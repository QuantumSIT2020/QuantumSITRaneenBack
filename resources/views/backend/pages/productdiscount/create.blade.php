@extends('backend.layouts.master')

@section('title',__('tr.Create Discount'))

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
                        <a href="{{route('discount')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">

                        <div class="body">
                            <form id="basic-form" style="padding:20px;" action="{{ route('store_discount') }}" method="post" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="product_id">@lang('tr.product'):</label>
                                    <select name="product_id" id="product_id" class="custom-select" required>
                                        <option value="">@lang('tr.Select product')</option>
                                        @foreach ($products as $product)
                                            @if(\Lang::getLocale() == 'en')
                                            <option value="{{ $product->id }}">{{$product->en_name }}</option>
                                            @else
                                                <option value="{{ $product->id }}">{{$product->ar_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="discount">@lang('tr.Discount'):</label>
                                    <input type="text" class="form-control" id ="discount"  name="discount"  value="{{ old('discount') }}" placeholder="@lang('tr.Enter Discount')"/>
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

