<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\Input as input;
use File;


class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index()
    {
        $childCategory_data = ChildCategory::all();
        return view('backend.pages.ChildCategory.index',compact('childCategory_data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $ChildCategory = ChildCategory::select($lang.'_name as name',$lang.'_desc as description','main_category_id','child_image','id')->get();
        $MainCategories = MainCategory::select($lang.'_name as name',$lang.'_desc as description','main_image','id')->get();
        return view('backend.pages.ChildCategory.create',compact('MainCategories','ChildCategory'));
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
            'en_name'                                        => 'required|max:255|min:2',
            'ar_name'                                        => 'required|max:255|min:2',
            'en_desc'                                        => 'required|min:2',
            'ar_desc'                                        => 'required|min:2',
            'child_image'                                    =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);

        $path_child_image = public_path().'/backend/dashboard_images/ChildCategory/';
        File::makeDirectory($path_child_image, $mode = 0777, true, true);

        $ChildCategory = new ChildCategory();

        $ChildCategory->en_name                    =strip_tags($request->en_name);
        $ChildCategory->ar_name                    =strip_tags($request->ar_name);
        $ChildCategory->en_desc                    =strip_tags($request->en_desc);
        $ChildCategory->ar_desc                    =strip_tags($request->ar_desc);
        $ChildCategory->main_category_id           =           $request->main_category_id;


        if ($request->hasFile('child_image')){
            $imageName = time().'.'.request()->child_image->getClientOriginalExtension();
            $request->child_image->move($path_child_image, $imageName);
            $ChildCategory->child_image = $imageName;
        }

        $ChildCategory->save();

        return redirect()->route('ChildCategory')->with('success',__('tr.ChildCategory Added successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ChildCategory_data = ChildCategory::findOrfail($id);
        return view('backend.pages.ChildCategory.show',compact('ChildCategory_data'));
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
        $ChildCategory_data = ChildCategory::findOrfail($id);
        $MainCategories = MainCategory::select($lang.'_name as name',$lang.'_desc as description','main_image','id')->get();
        return view('backend.pages.ChildCategory.edit',compact('ChildCategory_data','MainCategories'));

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
        $ChildCategory = ChildCategory::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',

        ]);


        $ChildCategory->en_name =strip_tags($request->en_name);
        $ChildCategory->ar_name =strip_tags($request->ar_name);
        $ChildCategory->en_desc =strip_tags($request->en_desc);
        $ChildCategory->ar_desc =strip_tags($request->ar_desc);


        $path_child_image = public_path().'/backend/dashboard_images/ChildCategory/';
        File::makeDirectory($path_child_image, $mode = 0777, true, true);


        if ($request->hasFile('child_image')){
            $imageName = time().'.'.request()->child_image->getClientOriginalExtension();
            $request->child_image->move($path_child_image, $imageName);
            $ChildCategory->child_image = $imageName;
        }

        $ChildCategory->save();

        return redirect()->route('ChildCategory')->with('success',__('tr.ChildCategory Updated successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ChildCategory_data = ChildCategory::findOrfail($id);
        $ChildCategory_data->delete();

        return redirect()->route('ChildCategory')->with('success',__('tr.ChildCategory Deleted successfully'));
    }



}
