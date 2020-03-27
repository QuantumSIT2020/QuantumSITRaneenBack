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
use App\Models\User;
use App\Models\WishList;
use Auth;

class ProductsController extends Controller
{
    public $path = 'frontend.pages.products.';

    public function __construct()
    {
        $this->middleware('auth')->except('mainCategory','childCategory','subCategory','brandProducts','brandFilter');
    }
    
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


    // Functions that need authencation

    public function addToWishList($productid,Request $request)
    {
        $user = User::findOrfail(Auth::user()->id);
        $product = Product::find($productid);

        if ($request->ajax()) {
            if (WishList::where('product_id',$productid)->where('user_id',Auth::user()->id)->count() > 0) {
                WishList::where('product_id',$productid)->where('user_id',Auth::user()->id)->delete();
                return response()->json(['deleted'=>'deleted']);
            }else{
                $wish_lists = new WishList();

                $wish_lists->user_id          = $user->id;
                $wish_lists->product_id       = $product->id;
                $wish_lists->save();
    
                return response()->json(['added'=>'added']);
            }
            
        }

        
    }

    
}
