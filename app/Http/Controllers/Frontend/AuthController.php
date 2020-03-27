<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;

class AuthController extends Controller
{
    public $path = 'frontend.pages.auth.';
    
    public function login()
    {
        return view($this->path.'login');
    }

    public function register()
    {
        return view($this->path.'register');
    }
    
    public function registerPost(Request $request)
    {
        $request->validate([
            'first_name'                                    => 'required|max:255|min:2',
            'last_name'                                     => 'required|max:255|min:2',
            'email'                                         => 'required|email|unique:users',
            'order_email'                                   => 'required|email',
            'gender'                                        => 'required',
            'mobile'                                        => 'required',
            'order_mobile'                                  => 'required',
            'address'                                       => 'required|max:255|min:2',
            'postal_code'                                   => 'required|max:255|min:2',
            'password'                                      => 'required|max:10|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->active = 1;
        $user->save();
        

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->birth_date = $request->birth_date;
        $customer->order_email = $request->order_email;
        $customer->gender = $request->gender;
        $customer->mobile = $request->mobile;
        $customer->order_mobile = $request->order_mobile;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->city = $request->city;
        $customer->postal_code = $request->postal_code;
        $customer->user_id = $user->id;
        $customer->save();

        if (Role::where('name','Customer')->count() > 0) {
            $user->assignRole('Customer');
        }else{
            Role::create(['name' => 'Customer']);
            $user->assignRole('Customer');
        }

        return redirect()->route('frontend_login');
    }

    public function forget()
    {
        return view($this->path.'forget');
    }
}
