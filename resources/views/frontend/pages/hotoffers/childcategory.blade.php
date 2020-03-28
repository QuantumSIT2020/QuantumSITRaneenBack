@extends('frontend.layouts.master')

@section('title',__('tr.Child Category'))

@section('content')

@section('breads')
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="{{ route('frontend_maincategory') }}">@lang('tr.Main Category')</a></li>
<li><i class="fa fa-angle-double-right"></i></li>
<li><a href="#">@yield('title')</a></li>
@endsection

@include('frontend.components.breadcrumb')

<section class="collection section-big-py-space ratio_square bg-light">
    <div class="container">
        <div class="row partition-collection">
            
            @foreach ($childs as $child)
            @php($subCategoryCount = \App\Models\ChildCategory::countSubCategory($child->id))
            @php($langName = \Lang::getLocale().'_name')
            @php($langDesc = \Lang::getLocale().'_desc')
            <div class="col-lg-4 col-md-6">
                <div class="collection-block">
                    <div><img src="{{ asset('backend/dashboard_images/ChildCategory/'.$child->child_image) }}" class="img-fluid  bg-img" alt=""></div>
                    <div class="collection-content">
                        <h4>({{ $subCategoryCount }} @lang('tr.Sub Category'))</h4>
                        <h3>{{ $child->$langName }}</h3>
                        <p>
                        {{ substr($child->$langDesc,0,77) }}
                        </p><a href="{{ route('frontend_products_brandcategory',$child->id) }}" class="btn btn-normal">@lang('tr.Shop Now')</a></div>
                </div>
            </div>

            @endforeach
            
            
           
        </div>
        
    </div>
</section>

@include('frontend.components.contactbanner')


@endsection