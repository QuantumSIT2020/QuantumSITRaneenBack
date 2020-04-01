<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DataEntry;
use App\Models\Customer;
use App\Models\MainOrder;
use Auth;

class UserController extends Controller
{
    public $path = 'frontend.pages.user.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $mainOrder = MainOrder::where('user_id',Auth::user()->id)->get();
        return view($this->path.'dashboard',compact('mainOrder'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrfail(Auth::user()->id);
        $request->validate([
            'first_name'                                    => 'required|max:255|min:2',
            'last_name'                                     => 'required|max:255|min:2',
            'email'                                         => 'unique:users,email,'.$user->id,
            'password'                                      => 'confirmed',
        ]);

        
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        if ($user->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if($user->hasRole('Customer')){
            $customer = Customer::where('user_id',$user->id)->get()->first();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->save();
        }

        if($user->hasRole('Buyer')){
            $buyer = Buyer::where('user_id',$user->id)->get()->first();
            $buyer->first_name = $request->first_name;
            $buyer->last_name = $request->last_name;
            $buyer->save();
        }

        if($user->hasRole('Data Entry')){
            $buyer = DataEntry::where('user_id',$user->id)->get()->first();
            $buyer->first_name = $request->first_name;
            $buyer->last_name = $request->last_name;
            $buyer->save();
        }

        return back()->with('success',__('tr.Data is Saved Successfully'));
    }
}
