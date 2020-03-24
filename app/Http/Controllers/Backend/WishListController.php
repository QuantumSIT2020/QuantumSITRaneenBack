<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;


class WishListController extends Controller
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

        $list      =  wish_lists::paginate(16);
        $Customer  = Customer::paginate(16);
        $Product   = Product::paginate(16);
        return view('backend.pages.wishlist.index',compact('Customer','Product','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.wishlist.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $cus_id=Input::get('cus_id');
          $customer_id= Customer::find($cus_id);

          $prod_id=Input::get('prod_id');
          $product_id= Product::find($prod_id);


         $wish_lists= new wish_lists();

         $wish_lists->customer_id      = $request->customer_id;
         $wish_lists->product_id       = $request->product_id;


          $wish_lists->save();


        return redirect()->route('wishlist')->with('success',__('tr.wishlist Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wish_lists = wish_lists::findOrfail($id);
        return view('backend.pages.wishlist.show',compact('wish_lists'));
    }


    public function destroy($id)
    {
        $wish_lists = wish_lists::findOrfail($id);
        $wish_lists->delete();

        return redirect()->route('wish_lists')->with('success',__('tr.wish_lists Deleted Successfully'));
    }
}
