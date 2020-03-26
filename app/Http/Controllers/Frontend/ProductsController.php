<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\GroupAttributes;
use App\Models\Attributes;

class ProductsController extends Controller
{
    public $path = 'frontend.pages.products.';
    
    public function mainCategory()
    {
        $mains = MainCategory::all();
        return view($this->path.'maincategory',compact('mains'));
    }

    public function childCategory($id)
    {
        $childs = ChildCategory::where('main_category_id',$id)->get();
        return view($this->path.'childcategory',compact('childs'));
    }

    public function subCategory($id)
    {
        $childs = ChildCategory::where('main_category_id',$id)->get();
        return view($this->path.'childcategory',compact('childs'));
    }

    public function brandProducts($id)
    {
        $brands = SubCategory::where('child_category_id',$id)->get();
        $brandsArray = [];
        foreach ($brands as $brand) {
            array_push($brandsArray,$brand->id);
        }
        $products = Product::where('isactive',1)->whereIn('sub_categories_id', $brandsArray)->get();
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        return view($this->path.'subcategory',compact('brands','products','attibuteGroups','attributes','latestSixProducts'));
    }
}
