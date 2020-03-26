<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = \Lang::getLocale();
        $Faq = Faq::select($lang.'_name as name',$lang.'_desc as description','id as id')->orderBy('id', 'asc')->get();

        return view('frontend.pages.faq.index',compact('Faq'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::getLocale();
        $Faq = Faq::select($lang.'_name as name',$lang.'_desc as description')->get();
        return view('frontend.pages.faq.create',compact('Faq'));
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


        $Faq = new Faq();

        $Faq->en_name =strip_tags($request->en_name);
        $Faq->ar_name =strip_tags($request->ar_name);
        $Faq->en_desc =strip_tags($request->en_desc);
        $Faq->ar_desc =strip_tags($request->ar_desc);


        $Faq->save();

        return redirect()->route('faq')->with('success',__('tr.faq Added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Faq = Faq::findOrfail($id);
        return view('frontend.pages.faq.show',compact('Faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Faq = Faq::findOrfail($id);
        return view('frontend.pages.faq.edit',compact('Faq'));
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
        $Faq = Faq::findOrfail($id);

        $request->validate([
            'en_name'                                       => 'required|max:255|min:2',
            'ar_name'                                       => 'required|max:255|min:2',
            'en_desc'                                       => 'required|min:2',
            'ar_desc'                                       => 'required|min:2',

        ]);


        $Faq->en_name =strip_tags($request->en_name);
        $Faq->ar_name =strip_tags($request->ar_name);
        $Faq->en_desc =strip_tags($request->en_desc);
        $Faq->ar_desc =strip_tags($request->ar_desc);

        $Faq->save();

        return redirect()->route('faq')->with('success',__('tr.faq Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Faq = Faq::findOrfail($id);
        $Faq->delete();

        return redirect()->route('faq')->with('success',__('tr.faq Deleted successfully'));
    }



    public function viewfaq()
    {
        $lang = \Lang::getLocale();
        $Faqs = Faq::select($lang.'_name as name',$lang.'_desc as description','id as id')->orderBy('id', 'asc')->get();

        return view('frontend.pages.faq.view',compact('Faqs'));
    }
}
