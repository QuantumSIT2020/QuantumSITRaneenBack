<?php

namespace App\Http\Controllers\Backend;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\bundle;
use App\Models\product_bundle;
use Hash;
class BundlesController extends Controller
{
    public $path = 'backend.pages.product_bundle.';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $bundles = bundle::paginate(16);
        $product_bundle = product_bundle::all();

        return view($this->path.'index',compact('bundles','product_bundle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = \Lang::locale();
        $products = Product::select('*')->pluck($lang.'_name','id');
        $product_bundle= Product::select('*')->pluck($lang.'_name','id');
        return view($this->path.'create',compact('products','product_bundle'));
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
            'en_name'         => 'required|min:2|max:255',
            'ar_name'         => 'required|min:2|max:255',
            'en_description'  => 'required',
            'ar_description'  => 'required',
            'start'           => 'required',
            'end'             => 'required',
            'price'           => 'required',


        ]);

        $bundle = new bundle();
        $bundle->en_name            = $request->en_name;
        $bundle->ar_name            = $request->ar_name;
        $bundle->en_description     = $request->en_description;
        $bundle->ar_description     = $request->ar_description;
        $bundle->price              = $request->price;
        $bundle->start              = $request->start;
        $bundle->end                = $request->end;

        $bundle->save();

        for ($i=0; $i < count($request->bundle_product_id); $i++) {
            $product_bundle = new product_bundle();
            $product_bundle->bundle_id                        = $bundle->id;
            $product_bundle->product_id                       = $request->product_id;
            $product_bundle->bundle_product_id                = $request->bundle_product_id[$i];
            $product_bundle->save();
        }

        return redirect()->route('bundles')->with('success',__('tr.bundles Saved Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bundle = bundle::findOrfail($id);
        $product_bundle = product_bundle::where('bundle_id',$id)->get();
        $main_product = product_bundle::where('bundle_id',$id)->get()->first();
//        dd($product_bundle);
        return view($this->path.'show',compact('bundle','product_bundle','main_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lang = \Lang::locale();
        $bundle                         = bundle::findOrfail($id);
        $main_product                   = product_bundle::where('bundle_id',$id)->get()->first();
        $product_bundles                 = product_bundle::where('bundle_id',$id)->get();
        $products                       = Product::select($lang.'_name as name','id')->get();
        $product_bundle=                Product::select('*')->pluck($lang.'_name','id');
       // dd($main_product);
        return view($this->path.'edit',compact('bundle','product_bundles','main_product','products','product_bundle'));
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
//        dd($request->all());
        $bundle = bundle::findOrfail($id);
        $request->validate([
            'en_name'         => 'required|min:2|max:255',
            'ar_name'         => 'required|min:2|max:255',
            'en_description'  => 'required',
            'ar_description'  => 'required',
            'start'           => 'required',
            'end'             => 'required',
            'price'           => 'required',

        ]);


        $bundle->en_name            = $request->en_name;
        $bundle->ar_name            = $request->ar_name;
        $bundle->en_description     = $request->en_description;
        $bundle->ar_description     = $request->ar_description;
        $bundle->price              = $request->price;
        $bundle->start              = $request->start;
        $bundle->end                = $request->end;


        $bundle->save();

        $product_bundle_old = product_bundle::where('bundle_id',$id)->get();
        foreach ($product_bundle_old as $bundle){
            $bundle->product_id = $request->product_id;
            $bundle->save();
        }
        if(isset($product_bundle)){
            for ($i=0; $i < count($request->bundle_product_id); $i++) {
                $product_bundle  = new product_bundle();
                $product_bundle->bundle_id                        = $id;
                $product_bundle->product_id                       = $request->product_id;
                $product_bundle->bundle_product_id                = $request->bundle_product_id[$i];
                $product_bundle->save();
            }
        }


        return redirect()->route('bundles')->with('success',__('tr.bundles updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bundle = bundle::findOrfail($id);
        $bundle->delete();

        return redirect()->route('bundles')->with('success',__('tr.bundles Deleted Successfully'));
    }

    public function delete_item_bundle($id)
    {
          $product_bundle   = product_bundle::findorfail($id)->delete();
          return back();

    }
}
