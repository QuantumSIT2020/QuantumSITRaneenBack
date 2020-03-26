<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages;
use Illuminate\Support\Facades\Input as input;
use File;

class PagesController extends Controller
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
//        $lang = \Lang::getLocale();
//        $page_data = pages::select($lang.'_name as name',$lang.'_desc as description','page_image','id')->get();
        $page_data = pages::paginate(16);

        return view('backend.pages.pages.index',compact('page_data'));

    }

    public function searchPages(Request $request)
    {
        $search = $request->search;
        $page_data = pages::select('pages.id as id',
            'pages.en_name',
            'pages.ar_name',
            'pages.en_desc',
            'pages.ar_desc',
            'pages.created_at',
            'pages.page_image')
            ->where('pages.id','like','%'.$search.'%')
            ->orWhere('pages.en_name','like','%'.$search.'%')
            ->orWhere('pages.ar_name','like','%'.$search.'%')
            ->orWhere('pages.en_desc','like','%'.$search.'%')
            ->orWhere('pages.ar_desc','like','%'.$search.'%')
            ->orWhere('pages.page_image','like','%'.$search.'%')
            ->paginate(16);

        return view('backend.pages.pages.search',compact('page_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $page_data = pages::select($lang.'_name as name',$lang.'_desc as description','page_image')->get();
        return view('backend.pages.pages.create',compact('page_data'));
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

        ]);

        $path_page_image = public_path().'/backend/dashboard_images/pages/';
        File::makeDirectory($path_page_image, $mode = 0777, true, true);

        $pages = new pages();

        $pages->en_name =strip_tags($request->en_name);
        $pages->ar_name =strip_tags($request->ar_name);
        $pages->en_desc =strip_tags($request->en_desc);
        $pages->ar_desc =strip_tags($request->ar_desc);






        if ($request->hasFile('page_image')){
            $imageName = time().'.'.request()->page_image->getClientOriginalExtension();
            $request->page_image->move($path_page_image, $imageName);
            $pages->page_image = $imageName;
        }

        $pages->save();

        return redirect()->route('pages')->with('success',__('tr.page Added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = pages::findOrfail($id);
        return view('backend.pages.pages.show',compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_data = pages::findOrfail($id);
        return view('backend.pages.pages.edit',compact('page_data'));
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
        $pages = pages::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',

        ]);


        $pages->en_name =strip_tags($request->en_name);
        $pages->ar_name =strip_tags($request->ar_name);
        $pages->en_desc =strip_tags($request->en_desc);
        $pages->ar_desc =strip_tags($request->ar_desc);


        $path_page_image = public_path().'/backend/dashboard_images/pages/';
        File::makeDirectory($path_page_image, $mode = 0777, true, true);

        if ($request->hasFile('page_image')){
            $imageName = time().'.'.request()->page_image->getClientOriginalExtension();
            $request->page_image->move($path_page_image, $imageName);
            $pages->page_image = $imageName;
        }

        $pages->save();

        return redirect()->route('pages')->with('success',__('tr.page Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page_data = pages::findOrfail($id);
        $page_data->delete();

        return redirect()->route('pages')->with('success',__('tr.page Deleted successfully'));
    }


    
}
