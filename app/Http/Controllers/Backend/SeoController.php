<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class SeoController extends Controller
{

    public function index()
    {
        $seo_data = Seo::findOrfail(1);
        return view('backend.pages.seo.index' ,compact('seo_data'));
    }


    public function update(Request $request)
    {

        $title          = $request->title;
        $footer         = $request->footer;
        $descriptions   = $request->descriptions;
        $seo = Seo::findOrfail(1);
        $seo->title         = $title;
        $seo->descriptions  = $descriptions;
        $seo->footer        = $footer;




        if($request->hasFile('logo')){
            $imageName = time().'.'.request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('/backend/dashboard_images/seo'), $imageName);
            $logo = $imageName;
            $seo->logo = $logo;

        }
        $seo->save();
        return back();



    }

}
