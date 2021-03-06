@extends('backend.layouts.master')

@section('title',__('tr.Update slider'))

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
            <div class="col-md-6 col-sm-12 text-right hidden-xs">
                <a href= "{{route('sliders')}}" class="btn btn-sm btn-primary btn-round" title="">@lang('tr.Back To List')</a>
            </div>

            <div class="body">
                <form style="padding:20px;" action="{{ route('update_sliders',$slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.en_name')</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="en_name" id="en_name" type="text" value="{{ $slider->en_name }}" >
                        </div>

                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.ar_name')</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="ar_name" id="ar_name" type="text" value="{{ $slider->ar_name }}" >
                        </div>

                    </div>

                    <hr>





                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">@lang('tr.Select another Image')</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" name="slider_image" id="file" aria-label="File browser example"  onchange="readURL(this);"  />
                            <img src="{{ URL::to('/') }}/backend/dashboard_images/sliders/{{ $slider->slider_image }}" class="img-thumbnail" width="100" />

                            <img id="blah" src="#" alt="@lang('tr.your image')" />
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

