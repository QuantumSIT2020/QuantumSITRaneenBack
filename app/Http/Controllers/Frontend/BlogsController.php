<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComment;


class BlogsController extends Controller
{
    public $path = 'frontend.pages.blogs.';
    
    public function index()
    {
        $blogs = Blog::where('type','blogs')->where('isactive',1)->paginate(4);
        return view($this->path.'index',compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrfail($id);
        $comments = BlogComment::where('blog_id',$id)->get();
        return view($this->path.'show',compact('blog','comments'));
    }

    public function addComment($id,Request $request)
    {
        $blog = Blog::findOrfail($id);
        $comment = new BlogComment();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ]);

        $comment->name = strip_tags($request->name);
        $comment->email = strip_tags($request->email);
        $comment->comment = strip_tags($request->comment);
        $comment->blog_id = $blog->id;
        $comment->save();

        return back();

    }
}
