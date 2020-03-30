<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public $path = 'frontend.pages.faq.';

    public function index()
    {
        $faqs = Faq::all();
        return view($this->path.'index',compact('faqs'));
    }
}
