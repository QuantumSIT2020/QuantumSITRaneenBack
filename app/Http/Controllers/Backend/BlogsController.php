<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use File;

class BlogsController extends Controller
{
    
    public function __construct()
   {
       $this->middleware('auth');
   }
    public function index()
    {
        //$lang = \Lang::getLocale();
        //$blog_data = Blog::select($lang.'_name as name',$lang.'_desc as description','blog_image','isactive','type','id')->get();
        $blog_data = Blog::paginate(16);
        return view('backend.pages.blogs.index',compact('blog_data'));
    }

    public function searchBlogs(Request $request)
    {
        $search = $request->search;
        $blog_data = Blog::select('blogs.id as id',
            'blogs.en_name',
            'blogs.ar_name',
            'blogs.en_desc',
            'blogs.ar_desc',
            'blogs.blog_image')
            ->where('blogs.id', 'like', '%' . $search . '%')
            ->orWhere('blogs.en_name', 'like', '%' . $search . '%')
            ->orWhere('blogs.ar_name', 'like', '%' . $search . '%')
            ->orWhere('blogs.en_desc', 'like', '%' . $search . '%')
            ->orWhere('blogs.ar_desc', 'like', '%' . $search . '%')
            ->orWhere('blogs.blog_image', 'like', '%' . $search . '%')
            ->paginate(16);

        return view('backend.pages.blogs.search', compact('blog_data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $blog_data = Blog::select($lang.'_name as name',$lang.'_desc as description','blog_image','isactive','type')->get();
        return view('backend.pages.blogs.create',compact('blog_data'));
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
            'type'                                          =>'required|',
            'blog_image'                                    =>  'image|mimes:jpeg,png,jpg,gif,svg|max:4196|required',

        ]);

        $path_blog_image = public_path().'/backend/dashboard_images/blogs/';
        File::makeDirectory($path_blog_image, $mode = 0777, true, true);

        $blogs = new Blog();

        $blogs->en_name =strip_tags($request->en_name);
        $blogs->ar_name =strip_tags($request->ar_name);
        $blogs->en_desc =strip_tags($request->en_desc);
        $blogs->ar_desc =strip_tags($request->ar_desc);
        $blogs->type    =strip_tags($request->type);


        if ($request->hasFile('blog_image')){
            $imageName = time().'.'.request()->blog_image->getClientOriginalExtension();
            $request->blog_image->move($path_blog_image, $imageName);
            $blogs->blog_image = $imageName;
        }

        $blogs->save();

        return redirect()->route('blogs')->with('success',__('tr.blog Added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog_data = Blog::findOrfail($id);
        return view('backend.pages.blogs.show',compact('blog_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog_data = Blog::findOrfail($id);
        return view('backend.pages.blogs.edit',compact('blog_data'));
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
        $blog_data = Blog::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',
            'type'                                          =>'required|',

        ]);


        $blog_data->en_name         =strip_tags($request->en_name);
        $blog_data->ar_name         =strip_tags($request->ar_name);
        $blog_data->en_desc         =strip_tags($request->en_desc);
        $blog_data->ar_desc         =strip_tags($request->ar_desc);
        $blog_data->type            =strip_tags($request->type);



        $path_blog_image = public_path().'/backend/dashboard_images/blogs/';
        File::makeDirectory($path_blog_image, $mode = 0777, true, true);
        if ($request->hasFile('blog_image')){
            $imageName = time().'.'.request()->blog_image->getClientOriginalExtension();
            $request->blog_image->move($path_blog_image, $imageName);
            $blog_data->blog_image = $imageName;
        }

        $blog_data->save();

        return redirect()->route('blogs')->with('success',__('tr.blog Updated successfully'));
    }



    public function status($id)
    {

        $data = Blog::findOrFail($id);
        $status = $data->isactive;
        $new_status = ($status+1)%2;

        $form_data = array(
            'isactive'       =>   $new_status
        );
        $result=  Blog::whereId($id)->update($form_data);

        echo  $result;



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog_data = Blog::findOrfail($id);
        $blog_data->delete();

        return redirect()->route('blogs')->with('success',__('tr.blog Deleted successfully'));
    }
}
