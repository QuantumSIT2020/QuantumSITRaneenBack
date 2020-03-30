@extends('backend.layouts.master')

@section('title',__('tr.Create New slider'))

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
                        <a href="{{route('sliders')}}" class="btn btn btn-info" title="Themeforest">@lang('tr.Back To List')</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">

                        <div class="body">
                            <form id="basic-form" style="padding:20px;" action="{{ route('store_sliders') }}" method="post" enctype="multipart/form-data">
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
                                    <label class="col-lg-4 file">@lang('tr.Select   Image')</label>
                                    <div class="col-md-8">
                                        <input type="file" id="file"   name="slider_image" aria-label="File browser example" onchange="readURL(this);" />
                                        <img id ="file3"  src="#" alt="@lang('tr.your image')"/>
                                        <span class="file-custom"></span>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="">@lang('tr.Slider Link For')</label>
                                        @php($langName = \Lang::Locale().'_name')
                                        <select name="slider_link" id="" class="custom-select">
                                            
                                            <optgroup label="@lang('tr.Sub Category')">
                                                @foreach ($subCategories as $sub)
                                                    <option value="sub#{{ $sub->id }}">{{ $sub->name }}</option>
                                                @endforeach
                                              </optgroup>

                                              <optgroup label="@lang('tr.Hot Offers')">
                                                <option value="hot#all">@lang('tr.All')</option>
                                                @foreach ($hotoffers as $offer)
                                                <option value="hot#{{ $offer->id }}">{{ $offer->product->$langName }}</option>
                                                @endforeach
                                              </optgroup>
                                            
                                              <optgroup label="@lang('tr.Discount')">
                                                <option value="discounts#all">@lang('tr.All')</option>
                                                @foreach ($discounts as $discount)
                                                <option value="discounts#{{ $discount->id }}">{{ $discount->products->$langName }}</option>
                                                @endforeach
                                              </optgroup>

                                              <optgroup label="@lang('tr.Products')">
                                                @foreach ($products as $product)
                                                <option value="product#{{ $product->id }}">{{ $product->$langName }}</option>
                                                @endforeach
                                              </optgroup>


                                        </select>
                                    </div>
                                </div>

                                <hr>


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















