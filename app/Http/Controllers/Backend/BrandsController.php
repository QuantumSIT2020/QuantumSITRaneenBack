<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use File;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

       $brands = Brand::select('name','image','id')->get();

        return view('backend.pages.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $brands = Brand::select('name','image','id')->get();
        return view('backend.pages.brands.create',compact('brands'));
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
            'name'                                          => 'required|max:255|min:2',
            'image'                                         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);

        $path_image = public_path().'/backend/dashboard_images/brands/';
        File::makeDirectory($path_image, $mode = 0777, true, true);

        $brand = new Brand();

        $brand->name =strip_tags($request->name);


        if ($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->image->move($path_image, $imageName);
            $brand->image = $imageName;
        }

        $brand->save();

        return redirect()->route('brands')->with('success',__('tr.brands Added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Brand = Brand::findOrfail($id);
        return view('backend.pages.brands.show',compact('Brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Brand = Brand::findOrfail($id);
        return view('backend.pages.brands.edit',compact('Brand'));
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
        $brand = Brand::findOrfail($id);

        $request->validate([
            'name'                                          => 'required|max:255|min:2',
            'image'                                         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);


        $brand->name =strip_tags($request->name);


        $path_image = public_path().'/backend/dashboard_images/brands/';
        File::makeDirectory($path_image, $mode = 0777, true, true);
        if ($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->image->move($path_image, $imageName);
            $brand->image = $imageName;
        }

        $brand->save();

        return redirect()->route('brands')->with('success',__('tr.brands Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Brand = Brand::findOrfail($id)->delete();


        return redirect()->route('brands')->with('success',__('tr.page Deleted successfully'));
    }
}
