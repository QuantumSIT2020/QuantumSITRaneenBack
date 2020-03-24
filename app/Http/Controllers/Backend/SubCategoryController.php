<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\Input as input;
use File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $lang = \Lang::getLocale();
        $subCategory_data = SubCategory::paginate(16);
        $ChildCategories = ChildCategory::paginate(16);
        return view('backend.pages.SubCategory.index',compact('subCategory_data','ChildCategories'));

    }
    public function searchSubCategory(Request $request)
    {


        $search = $request->search;
        $subCategory_data = SubCategory::select('sub_categories.id as id',
            'sub_categories.en_name',
            'sub_categories.ar_name',
            'sub_categories.en_desc',
            'sub_categories.ar_desc',
            'sub_categories.sub_image',
            'sub_categories.child_category_id as child_category_id',
            'child_categories.id as child_category_id',
            'child_categories.en_name as enChildCaregory',
            'child_categories.ar_name as arChildCaregory',
            'main_categories.id as main_category_id',
            'main_categories.en_name as en_MainCaregory',
            'main_categories.ar_name as ar_MainCaregory'

        )
            ->join('child_categories','child_categories.id','sub_categories.child_category_id')
            ->join('main_categories','main_categories.id','child_categories.main_category_id')
            ->where('sub_categories.en_name','like','%'.$search.'%')
            ->orWhere('sub_categories.ar_name','like','%'.$search.'%')
            ->orWhere('sub_categories.en_desc','like','%'.$search.'%')
            ->orWhere('sub_categories.ar_desc','like','%'.$search.'%')
            ->orWhere('sub_categories.sub_image','like','%'.$search.'%')
            ->orWhere('child_categories.en_name','like','%'.$search.'%')
            ->orWhere('child_categories.ar_name','like','%'.$search.'%')
            ->orWhere('main_categories.en_name','like','%'.$search.'%')
            ->orWhere('main_categories.ar_name','like','%'.$search.'%')
            ->paginate(16);

        return view('backend.pages.SubCategory.search',compact('subCategory_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $ChildCategories = ChildCategory::select($lang.'_name as name',$lang.'_desc as description','main_category_id','child_image','id')->get();
        $subCategories = SubCategory::select($lang.'_name as name',$lang.'_desc as description','sub_image','child_category_id','id')->get();
        return view('backend.pages.SubCategory.create',compact('ChildCategories','subCategories'));
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
            'sub_image'                                      =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);

        $path_sub_image = public_path().'/backend/dashboard_images/SubCategory/';
        File::makeDirectory($path_sub_image, $mode = 0777, true, true);

        $subCategory = new SubCategory();

        $subCategory->en_name                     =strip_tags($request->en_name);
        $subCategory->ar_name                     =strip_tags($request->ar_name);
        $subCategory->en_desc                     =strip_tags($request->en_desc);
        $subCategory->ar_desc                     =strip_tags($request->ar_desc);
        $subCategory->child_category_id           =           $request->child_category_id;


        if ($request->hasFile('sub_image')){
            $imageName = time().'.'.request()->sub_image->getClientOriginalExtension();
            $request->sub_image->move($path_sub_image, $imageName);
            $subCategory->sub_image = $imageName;
        }

        $subCategory->save();

        return redirect()->route('SubCategory')->with('success',__('tr.ChildCategory Added successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCategory_data = SubCategory::findOrfail($id);
        return view('backend.pages.SubCategory.show',compact('subCategory_data'));
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
        $subCategory_data = SubCategory::findOrfail($id);
        $ChildCategories = ChildCategory::select($lang.'_name as name',$lang.'_desc as description','main_category_id','child_image','id')->get();
        return view('backend.pages.SubCategory.edit',compact('ChildCategories','subCategory_data'));

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
        $subCategory = SubCategory::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',

        ]);


        $subCategory->en_name =strip_tags($request->en_name);
        $subCategory->ar_name =strip_tags($request->ar_name);
        $subCategory->en_desc =strip_tags($request->en_desc);
        $subCategory->ar_desc =strip_tags($request->ar_desc);


        $path_sub_image = public_path().'/backend/dashboard_images/SubCategory/';
        File::makeDirectory($path_sub_image, $mode = 0777, true, true);


        if ($request->hasFile('sub_image')){
            $imageName = time().'.'.request()->sub_image->getClientOriginalExtension();
            $request->sub_image->move($path_sub_image, $imageName);
            $subCategory->sub_image = $imageName;
        }

        $subCategory->save();

        return redirect()->route('SubCategory')->with('success',__('tr.SubCategory Updated successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ChildCategory_data = SubCategory::findOrfail($id);
        $ChildCategory_data->delete();

        return redirect()->route('SubCategory')->with('success',__('tr.SubCategory Deleted successfully'));
    }



}
