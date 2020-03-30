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
use App\Models\Product_attribute;
use App\Models\Product_Gallery;
use App\Models\bundle;
use App\Models\product_bundle;

class ProductsBundlesController extends Controller
{
    public $path = 'frontend.pages.products.';

    public function __construct()
    {
        $this->middleware('auth')->except('mainCategory',
            'childCategory',
            'subCategory',
            'brandProducts',
            'brandFilter',
            'hotoffers',
            'hotOfferFilter',
            'discountsProducts',
            'discountsProductsFilter',
            'productDetails');
    }


    public function bundlesProducts()
    {
        $bundles = bundle::select('*')->paginate(16);
        return view($this->path.'bundles',compact('bundles'));
    }




    //Bundels Details
    public function bundles_details($id)
    {
        $bundle = bundle::findOrfail($id);
//        dd($bundle);
        $main_product = product_bundle::where('bundle_id',$id)->get()->first();
        $product_bundle = product_bundle::where('bundle_id',$id)->get();
        $gallery = Product_Gallery::where('product_id',$id)->get();

        return view($this->path.'bundledetailes',compact('bundle','main_product','product_bundle','gallery'));
    }


















}
