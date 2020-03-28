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
use App\Models\Product_HotOffer;
use App\Models\Product_sale;
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


    //Hot Offers
    public function hotoffers()
    {
        $brands = SubCategory::all();
        $hotOffers = Product_HotOffer::all();
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        return view($this->path.'hotoffers',compact('hotOffers','brands','attibuteGroups','attributes','latestSixProducts'));
    }

    public function hotOfferFilter(Request $request)
    {
        $hotOffers = Product_HotOffer::select('*')->join('products','products.id','product__hot_offers.product_id');
        
        if (isset($request->brands)) {
            if ($request->brands != null) {
                $hotOffers = $hotOffers->whereIn('products.sub_categories_id',$request->brands);
            }
        }

        if (isset($request->product_attributes)) {
            if ($request->product_attributes != null) {
                $hotOffers = $hotOffers->join('product_attributes','product_attributes.product_id','products.id')->whereIn('product_attributes.attribute_id',$request->product_attributes);
            }
        }

        if(isset($request->prices)){
            if ($request->prices != null) {
                for ($i=0; $i < count($request->prices); $i++) { 
                    if (explode(',',$request->prices[$i])[0] == '') {
                        $hotOffers = $hotOffers->where('products.price','>',explode(',',$request->prices[$i])[1]);
                    }else{
                        $hotOffers = $hotOffers->whereBetween('products.price', [explode(',',$request->prices[$i])[0], explode(',',$request->prices[$i])[1]]);
                    }
                }
            }
        }

        


        $brands = SubCategory::all();
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        $hotOffers = $hotOffers->get();

        return view($this->path.'hotofferfilter',compact('brands','hotOffers','attibuteGroups','attributes','latestSixProducts'));
    }


    //Discount
    public function discountsProducts()
    {
        $brands = SubCategory::all();
        $discounts = Product_sale::all();
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        return view($this->path.'discounts',compact('discounts','brands','attibuteGroups','attributes','latestSixProducts'));
    }

    public function discountsProductsFilter(Request $request)
    {
        $discounts = Product_sale::select('*')->join('products','products.id','product_sales.product_id');
        
        if (isset($request->brands)) {
            if ($request->brands != null) {
                $discounts = $discounts->whereIn('products.sub_categories_id',$request->brands);
            }
        }

        if (isset($request->product_attributes)) {
            if ($request->product_attributes != null) {
                $discounts = $discounts->join('product_attributes','product_attributes.product_id','products.id')->whereIn('product_attributes.attribute_id',$request->product_attributes);
            }
        }

        if(isset($request->prices)){
            if ($request->prices != null) {
                for ($i=0; $i < count($request->prices); $i++) { 
                    if (explode(',',$request->prices[$i])[0] == '') {
                        $discounts = $discounts->where('products.price','>',explode(',',$request->prices[$i])[1]);
                    }else{
                        $discounts = $discounts->whereBetween('products.price', [explode(',',$request->prices[$i])[0], explode(',',$request->prices[$i])[1]]);
                    }
                }
            }
        }

        


        $brands = SubCategory::all();
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        $discounts = $discounts->get();

        return view($this->path.'discountfilter',compact('brands','discounts','attibuteGroups','attributes','latestSixProducts'));
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
