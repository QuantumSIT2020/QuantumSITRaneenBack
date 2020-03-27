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
        $Sliders                                 = Slider::select($lang.'_name as name','slider_image','id')->get();
        $lastHotOffer                            = Product_HotOffer::select('*')->orderBy('id', 'desc')->get()->first();
        $beforelastHotOffer                      = Product_HotOffer::select('*')->orderBy('id', 'desc')->skip(1)->take(1)->get()->first();
        $lastdiscounts                           = Product_sale::select('*')->orderBy('id', 'desc')->get()->first();
        $lastbeforediscounts                     = Product_sale::select('*')->orderBy('id', 'desc')->skip(1)->take(1)->get()->first();

        return view('frontend.index',compact('MainCategories','ChildCategories','subCategories','Sliders','lastHotOffer','beforelastHotOffer','lastdiscounts','brands','lastbeforediscounts'));
    }
}
