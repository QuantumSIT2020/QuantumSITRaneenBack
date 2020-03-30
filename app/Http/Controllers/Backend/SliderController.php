<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Product_HotOffer;
use App\Models\Product_sale;
use App\Models\Product;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(16);
        return view('backend.pages.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $subCategories = SubCategory::select($lang.'_name as name',$lang.'_desc','id')->get();
        $discounts = Product_sale::all();
        $hotoffers = Product_HotOffer::all();
        $products = Product::all();
        $slider = Slider::select($lang.'_name as name','slider_image')->get();
        return view('backend.pages.sliders.create',compact('slider','subCategories','discounts','hotoffers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'en_name'                                         => 'required|max:255|min:2',
            'ar_name'                                         => 'required|max:255|min:2',
            'slider_image'                                    =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);

        $path_slider_image = public_path().'/backend/dashboard_images/sliders/';
        File::makeDirectory($path_slider_image, $mode = 0777, true, true);

        $slider = new Slider();

        $slider->en_name =strip_tags($request->en_name);
        $slider->ar_name =strip_tags($request->ar_name);
        $slider->slider_link = $request->slider_link;


        if ($request->hasFile('slider_image')){
            $imageName = time().'.'.request()->slider_image->getClientOriginalExtension();
            $request->slider_image->move($path_slider_image, $imageName);
            $slider->slider_image = $imageName;
        }

        $slider->save();

        return redirect()->route('sliders')->with('success',__('tr.sliders Added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::findOrfail($id);
        return view('backend.pages.sliders.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lang = \Lang::getLocale();
        $slider = Slider::findOrfail($id);
        $subCategories = SubCategory::select($lang.'_name as name',$lang.'_desc','id')->get();
        $discounts = Product_sale::all();
        $hotoffers = Product_HotOffer::all();
        $products = Product::all();
        
        return view('backend.pages.sliders.edit',compact('slider','subCategories','discounts','hotoffers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',

        ]);


        $slider->en_name =strip_tags($request->en_name);
        $slider->ar_name =strip_tags($request->ar_name);



        $path_slider_image = public_path().'/backend/dashboard_images/sliders/';
        File::makeDirectory($path_slider_image, $mode = 0777, true, true);


        if ($request->hasFile('slider_image')){
            $imageName = time().'.'.request()->slider_image->getClientOriginalExtension();
            $request->slider_image->move($path_slider_image, $imageName);
            $slider->slider_image = $imageName;
        }

        $slider->save();

        return redirect()->route('sliders')->with('success',__('tr.slider Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slider = Slider::findOrfail($id);
        $Slider->delete();

        return redirect()->route('sliders')->with('success',__('tr.Slider Deleted successfully'));
    }
}
