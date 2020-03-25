@extends('backend.layouts.master')

@section('title',__('tr.Update Discount'))

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
                <a href="{{route('discount')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
            </div>
            <div class="body">
                <form style="padding:20px;" action="{{ route('update_discount',$Product_sale->id) }}" method="post" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group row">
                        <label  class="col-sm-12 col-md-2 col-form-label" for="main_category_id">@lang('tr.products')</label>
                        <div class="col-sm-12 col-md-10">
                            {!! Form::select('product_id', $products,  $Product_sale->product_id , ['class'=>'custom-select required']) !!}

                        </div>
                    </div>





                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.Discount')</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="discount" id="discount" type="text" value="{{ $Product_sale->discount }}" >
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

