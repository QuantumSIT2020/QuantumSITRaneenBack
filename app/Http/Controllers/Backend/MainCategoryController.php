<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Input as input;
use File;


class MainCategoryController extends Controller
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
        $MainCategory_data = MainCategory::paginate(16);
        return view('backend.pages.MainCategory.index',compact('MainCategory_data'));

    }

    public function searchMainCategory(Request $request)
    {

        $search = $request->search;
        $MainCategory_data = MainCategory::select('main_categories.id as id',
            'main_categories.en_name',
            'main_categories.ar_name',
            'main_categories.en_desc',
            'main_categories.ar_desc',
            'main_categories.main_image')
            ->where('main_categories.id','like','%'.$search.'%')
            ->orWhere('main_categories.en_name','like','%'.$search.'%')
            ->orWhere('main_categories.ar_name','like','%'.$search.'%')
            ->orWhere('main_categories.en_desc','like','%'.$search.'%')
            ->orWhere('main_categories.ar_desc','like','%'.$search.'%')
            ->orWhere('main_categories.main_image','like','%'.$search.'%')
            ->paginate(16);

        return view('backend.pages.MainCategory.search',compact('MainCategory_data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $MainCategory_data = MainCategory::select($lang.'_name as name',$lang.'_desc as description','main_image')->get();
        return view('backend.pages.MainCategory.create',compact('MainCategory_data'));
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
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',
            'main_image'                                    =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);

        $path_main_image = public_path().'/backend/dashboard_images/MainCategory/';
        File::makeDirectory($path_main_image, $mode = 0777, true, true);

        $MainCategory = new MainCategory();

        $MainCategory->en_name =strip_tags($request->en_name);
        $MainCategory->ar_name =strip_tags($request->ar_name);
        $MainCategory->en_desc =strip_tags($request->en_desc);
        $MainCategory->ar_desc =strip_tags($request->ar_desc);


        if ($request->hasFile('main_image')){
            $imageName = time().'.'.request()->main_image->getClientOriginalExtension();
            $request->main_image->move($path_main_image, $imageName);
            $MainCategory->main_image = $imageName;
        }

        $MainCategory->save();

        return redirect()->route('MainCategory')->with('success',__('tr.MainCategory Added successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $MainCategory_data = MainCategory::findOrfail($id);
        return view('backend.pages.MainCategory.show',compact('MainCategory_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $MainCategory_data = MainCategory::findOrfail($id);
        return view('backend.pages.MainCategory.edit',compact('MainCategory_data'));

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
        $MainCategory = MainCategory::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',

        ]);


        $MainCategory->en_name =strip_tags($request->en_name);
        $MainCategory->ar_name =strip_tags($request->ar_name);
        $MainCategory->en_desc =strip_tags($request->en_desc);
        $MainCategory->ar_desc =strip_tags($request->ar_desc);


        $path_main_image = public_path().'/backend/dashboard_images/MainCategory/';
        File::makeDirectory($path_main_image, $mode = 0777, true, true);


        if ($request->hasFile('main_image')){
            $imageName = time().'.'.request()->main_image->getClientOriginalExtension();
            $request->main_image->move($path_main_image, $imageName);
            $MainCategory->main_image = $imageName;
        }

        $MainCategory->save();

        return redirect()->route('MainCategory')->with('success',__('tr.MainCategory Updated successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $MainCategory_data = MainCategory::findOrfail($id);
        $MainCategory_data->delete();

        return redirect()->route('MainCategory')->with('success',__('tr.MainCategory Deleted successfully'));
    }



}
