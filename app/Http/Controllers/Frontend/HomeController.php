<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Models\ChildCategory;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Product_sale;
use App\Models\Product_HotOffer;
use App\Models\Blog;
use App\Models\Review;
use App\Models\GroupAttributes;
use App\Models\Attributes;
use App\Models\Testimonial;
use DB;

class HomeController extends Controller
{
    public $path = 'frontend.';

    public function index()
    {
        $lang = \Lang::getLocale();
        $MainCategories                          = MainCategory::select($lang.'_name as name',$lang.'_desc as description','main_image','id')->get();
        $ChildCategories                         = ChildCategory::select($lang.'_name as name',$lang.'_desc as description','main_category_id','child_image','id')->get();
        $subCategories                           = SubCategory::select($lang.'_name as name',$lang.'_desc as description','sub_image','child_category_id','id')->get();
        $brands                                  = SubCategory::select('*')->orderBy('id', 'desc')->take(8)->get();
        $Sliders                                 = Slider::select($lang.'_name as name','slider_image','id','slider_link')->get();
        $lastHotOffer                            = Product_HotOffer::select('*')->orderBy('id', 'desc')->get()->first();
        $beforelastHotOffer                      = Product_HotOffer::select('*')->orderBy('id', 'desc')->skip(1)->take(1)->get()->first();
        $lastdiscounts                           = Product_sale::select('*')->orderBy('id', 'desc')->get()->first();
        $lastbeforediscounts                     = Product_sale::select('*')->orderBy('id', 'desc')->skip(1)->take(1)->get()->first();
        $lasttwoDiscount                         = Product_sale::select('*')->orderBy('id', 'desc')->limit(2)->get();
        $lastAftertwoDiscount                    = Product_sale::select('*')->orderBy('id', 'desc')->skip(2)->take(2)->get();
        $lasttwoHotOffer                         = Product_HotOffer::select('*')->orderBy('id', 'desc')->limit(2)->get();
        $lastfourBlogs                           = Blog::select('*')->where('type','blogs')->where('isactive',1)->orderBy('id', 'desc')->limit(4)->get();
        $LastFourMainCategories                  = MainCategory::select($lang.'_name as name',$lang.'_desc as description','main_image','id')->limit(6)->get();
        $allReviews                              = Review::all();
        $products                                = Product::all();
        $leatestproduct                          = Product::select('*')->orderBy('id', 'desc')->get();
        $discounts                               = Product_sale::select('*')->get();
        $reviews                                 = Review::all();
        $testimonials                            = Testimonial::select($lang.'_name as name',$lang.'_desc as description','image','id')->get();

        
        

        return view('frontend.index',compact('allReviews','LastFourMainCategories','lastfourBlogs','lasttwoHotOffer',
            'lastAftertwoDiscount','lasttwoDiscount','MainCategories',
            'ChildCategories','subCategories','Sliders','lastHotOffer',
            'beforelastHotOffer','lastdiscounts','brands',
            'lastbeforediscounts','leatestproduct','discounts','reviews','products','testimonials'));
    }

    public function search(Request $request)
    {

        $child_category_id = $request->childSearch;
        $brands = SubCategory::where('child_category_id',$request->childSearch)->get();
        $products = [];
        
        $childCheck = Product::join('sub_categories','sub_categories.id','products.sub_categories_id')
                            ->join('child_categories','child_categories.id','sub_categories.child_category_id')
                            ->where('child_categories.id',$request->childSearch)->get();

        if (count($childCheck) > 0) {
            $products = Product::where('products.en_name','like','%'.$request->searchSearch.'%')
                            ->orWhere('products.ar_name','like','%'.$request->searchSearch.'%')
                            ->orWhere('products.description','like','%'.$request->searchSearch.'%')->get();
        }
        
        
        $attibuteGroups = GroupAttributes::all();
        $attributes = Attributes::all();
        $latestSixProducts = Product::orderBy('id','desc')->limit(6)->where('isactive',1)->get();
        return view('frontend.pages.products.subcategory',compact('child_category_id','brands','products','attibuteGroups','attributes','latestSixProducts'));
        
    }
}
