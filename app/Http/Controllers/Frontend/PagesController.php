<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages;

class PagesController extends Controller
{
    public $path = 'frontend.pages.more.';
    
    public function index($id)
    {
        $lang = \Lang::getLocale();
        $pages = pages::select($lang.'_name as name',$lang.'_desc as description','page_image','id as id')->orderBy('id', 'asc')->where('id',$id)->get()->first();

        return view($this->path.'index',compact('pages'));
    }
}
