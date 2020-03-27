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
        $child_category_id = $id;
        $brands = SubCategory::where('child_category_id',$id)->get();
        $brandsArray = [];
        foreach ($brands as $brand) {
            array_push($brandsArray,$brand->id);
        }
        $products = Product::where('isactive',1)->whereIn('sub_categories_id', $brandsArray)->get();
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        return view($this->path.'subcategory',compact('child_category_id','brands','products','attibuteGroups','attributes','latestSixProducts'));
    }

    public function brandFilter(Request $request,$id)
    {
        $products = Product::select('*');
        if (isset($request->brands)) {
            if ($request->brands != null) {
                $products = $products->whereIn('sub_categories_id',$request->brands);
            }
        }

        if (isset($request->product_attributes)) {
            if ($request->product_attributes != null) {
                $products = $products->join('product_attributes','product_attributes.product_id','products.id')->whereIn('product_attributes.attribute_id',$request->product_attributes);
            }
        }

        if(isset($request->prices)){
            if ($request->prices != null) {
                for ($i=0; $i < count($request->prices); $i++) { 
                    if (explode(',',$request->prices[$i])[0] == '') {
                        $products = $products->where('price','>',explode(',',$request->prices[$i])[1]);
                    }else{
                        $products = $products->whereBetween('price', [explode(',',$request->prices[$i])[0], explode(',',$request->prices[$i])[1]]);
                    }
                }
            }
        }


        $child_category_id = $id;
        $brands = SubCategory::where('child_category_id',$id)->get();
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        $products = $products->where('isactive',1)->get();

        return view($this->path.'filter',compact('child_category_id','brands','products','attibuteGroups','attributes','latestSixProducts'));
    }
}
