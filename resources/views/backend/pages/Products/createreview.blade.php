@extends('backend.layouts.master')

@section('title',__('tr.Create  Review'))

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
                        <a href="{{route('reviews')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">

                        <div class="body">
                            <form id="basic-form" style="padding:20px;" action="{{ route('store_reviews') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="reviews">@lang('tr.reviews'):</label>
                                    <input type="number" class="form-control" id ="reviews" min="1" max="5" name="reviews"  value="{{ old('reviews') }}" placeholder="@lang('tr.Enter  reviews')"/>
                                </div>


                                <div class="form-group">
                                    <label for="comments">@lang('tr.comments'):</label>
                                    <textarea name="comments" id="comments" cols="30" rows="5" class="form-control m-input" placeholder="@lang('tr.Enter comments')" required>{{ old('comments') }}</textarea>

                                </div>

                                <div class="form-group">
                                    <label for="product_id">@lang('tr.products'):</label>
                                    <select name="product_id" id="product_id" class="custom-select" required>
                                        <option value="">@lang('tr.Select products')</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{$product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">@lang('tr.save')</button>
                            </form>
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















