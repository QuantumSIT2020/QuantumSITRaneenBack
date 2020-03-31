<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

use File;

class TestimonialsController extends Controller
{ public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $lang = \Lang::getLocale();
        $testimonial= Testimonial::select($lang.'_name as name',$lang.'_desc as description','image','id')->get();
        return view('backend.pages.testimonials.index',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $testimonial= Testimonial::select($lang.'_name as name',$lang.'_desc as description','image','id')->get();
        return view('backend.pages.testimonials.create',compact('testimonial'));
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
            'image'                                         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',


        ]);

        $path_image = public_path().'/backend/dashboard_images/testimonials/';
        File::makeDirectory($path_image, $mode = 0777, true, true);

        $testimonial = new Testimonial();

        $testimonial->en_name =strip_tags($request->en_name);
        $testimonial->ar_name =strip_tags($request->ar_name);
        $testimonial->en_desc =strip_tags($request->en_desc);
        $testimonial->ar_desc =strip_tags($request->ar_desc);


        if ($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->image->move($path_image, $imageName);
            $testimonial->image = $imageName;
        }

        $testimonial->save();

        return redirect()->route('testimonials')->with('success',__('tr.testimonials Added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::findOrfail($id);
        return view('backend.pages.testimonials.show',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrfail($id);
        return view('backend.pages.testimonials.edit',compact('testimonial'));
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
        $testimonial = Testimonial::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',
            'image'                                         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);

        $testimonial->en_name =strip_tags($request->en_name);
        $testimonial->ar_name =strip_tags($request->ar_name);
        $testimonial->en_desc =strip_tags($request->en_desc);
        $testimonial->ar_desc =strip_tags($request->ar_desc);



        $path_image = public_path().'/backend/dashboard_images/testimonials/';
        File::makeDirectory($path_image, $mode = 0777, true, true);

        if ($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->image->move($path_image, $imageName);
            $testimonial->image = $imageName;
        }

        $testimonial->save();

        return redirect()->route('testimonials')->with('success',__('tr.testimonials Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $testimonial = Testimonial::findOrfail($id)->delete();


        return redirect()->route('testimonials')->with('success',__('tr.testimonials Deleted successfully'));
    }
}
