<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Buyer;
use App\Models\DataEntry;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;

class UsersController extends Controller
{
    public $path = 'backend.pages.Users.';
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function customers()
    {
        $customers = Customer::paginate(16);
        return view($this->path.'Customers.index',compact('customers'));
    }

    public function createCustomers()
    {
        return view($this->path.'Customers.create');
    }

    public function storeCustomers(Request $request)
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

        return redirect()->route('customers')->with('success',__('tr.Customer Data Saved Successfully'));


    }

    public function showCustomers($id)
    {
        $customer = Customer::findOrfail($id);
        return view($this->path.'Customers.show',compact('customer'));
    }

    public function editCustomers($id)
    {
        $customer = Customer::findOrfail($id);
        $user = User::findOrfail($customer->user_id);
        return view($this->path.'Customers.edit',compact('customer'));
    }

    public function updateCustomers(Request $request)
    {
        $customer = Customer::findOrfail($request->customer_id);
        $user = User::findOrfail($customer->user_id);

        $request->validate([
            'first_name'                                    => 'required|max:255|min:2',
            'last_name'                                     => 'required|max:255|min:2',
            'email'                                         => 'unique:users,email,'.$user->id,
            'order_email'                                   => 'required|email',
            'gender'                                        => 'required',
            'mobile'                                        => 'required',
            'order_mobile'                                  => 'required',
            'address'                                       => 'required|max:255|min:2',
            'postal_code'                                   => 'required|max:255|min:2',
            'password'                                      => 'confirmed',
        ]);

        
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        if ($user->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
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
        
        $customer->save();

        return redirect()->route('customers')->with('success',__('tr.Customer Data Saved Successfully'));


    }

    public function destroyCustomers($id)
    {
        $customer = Customer::findOrfail($id);
        $user = User::findOrfail($customer->user_id);

        $customer->delete();
        $user->delete();

        return redirect()->route('customers')->with('success',__('tr.Customer Deleted Successfully'));
    }

    public function searchCustomers(Request $request)
    {
        $search = $request->search;
        $customers = Customer::select('customers.id as customer_id',
                                 'customers.first_name',
                                 'customers.last_name',
                                 'customers.order_email',
                                 'customers.gender',
                                 'customers.birth_date',
                                 'customers.order_mobile',
                                 'customers.mobile',
                                 'customers.country',
                                 'customers.city',
                                 'customers.address',
                                 'customers.postal_code',
                                 'users.id as user_id',
                                 'users.email',
                                 'users.name as user_name')
                        ->join('users','users.id','customers.user_id')
                        ->where('customers.first_name','like','%'.$search.'%')
                        ->orWhere('customers.last_name','like','%'.$search.'%')
                        ->orWhere('customers.order_email','like','%'.$search.'%')
                        ->orWhere('customers.email','like','%'.$search.'%')
                        ->orWhere('customers.birth_date','like','%'.$search.'%')
                        ->orWhere('customers.order_mobile','like','%'.$search.'%')
                        ->orWhere('customers.mobile','like','%'.$search.'%')
                        ->orWhere('customers.address','like','%'.$search.'%')
                        ->orWhere('customers.postal_code','like','%'.$search.'%')
                        ->orWhere('users.name','like','%'.$search.'%')
                        ->paginate(16);

                        // dd($customers);
                        
        return view($this->path.'Customers.search',compact('customers'));
    }


    //Buyers
    public function buyers()
    {
        $buyers = Buyer::paginate(16);
        return view($this->path.'Buyers.index',compact('buyers'));
    }

    public function createBuyers()
    {
        return view($this->path.'Buyers.create');
    }

    public function storeBuyers(Request $request)
    {
        $request->validate([
            'first_name'                                    => 'required|max:255|min:2',
            'last_name'                                     => 'required|max:255|min:2',
            'email'                                         => 'required|email|unique:users',
            'gender'                                        => 'required',
            'mobile'                                        => 'required',
            'password'                                      => 'required|max:10|min:6|confirmed',
        ]);


        $user = new User();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        

        $buyer = new Buyer();
        $buyer->first_name = $request->first_name;
        $buyer->last_name = $request->last_name;
        $buyer->birth_date = $request->birth_date;
        $buyer->gender = $request->gender;
        $buyer->mobile = $request->mobile;
        $buyer->user_id = $user->id;
        $buyer->save();

        if (Role::where('name','Buyer')->count() > 0) {
            $user->assignRole('Buyer');
        }else{
            Role::create(['name' => 'Buyer']);
            $user->assignRole('Buyer');
        }

        return redirect()->route('buyers')->with('success',__('tr.Buyer Data Saved Successfully'));


    }

    public function showBuyers($id)
    {
        $buyer = Buyer::findOrfail($id);
        return view($this->path.'Buyers.show',compact('buyer'));
    }

    public function editBuyers($id)
    {
        $buyer = Buyer::findOrfail($id);
        $user = User::findOrfail($buyer->user_id);
        return view($this->path.'Buyers.edit',compact('buyer'));
    }

    public function updateBuyers(Request $request)
    {
        $buyer = Buyer::findOrfail($request->buyer_id);
        $user = User::findOrfail($buyer->user_id);

        $request->validate([
            'first_name'                                    => 'required|max:255|min:2',
            'last_name'                                     => 'required|max:255|min:2',
            'email'                                         => 'unique:users,email,'.$user->id,
            'gender'                                        => 'required',
            'mobile'                                        => 'required',
            'password'                                      => 'confirmed',
        ]);

        
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        if ($user->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        $buyer->first_name = $request->first_name;
        $buyer->last_name = $request->last_name;
        $buyer->birth_date = $request->birth_date;
        $buyer->gender = $request->gender;
        $buyer->mobile = $request->mobile;
        $buyer->user_id = $user->id;
        $buyer->save();

        return redirect()->route('buyers')->with('success',__('tr.Buyer Data Saved Successfully'));


    }

    public function destroyBuyers($id)
    {
        $buyer = Buyer::findOrfail($id);
        $user = User::findOrfail($buyer->user_id);

        $buyer->delete();
        $user->delete();

        return redirect()->route('buyers')->with('success',__('tr.Buyer Deleted Successfully'));
    }

    public function searchBuyers(Request $request)
    {
        $search = $request->search;
        $buyers = Buyer::select('buyers.id as buyer_id',
                                 'buyers.first_name',
                                 'buyers.last_name',
                                 'buyers.gender',
                                 'buyers.birth_date',
                                 'buyers.mobile',
                                 'users.id as user_id',
                                 'users.email',
                                 'users.name as user_name')
                        ->join('users','users.id','buyers.user_id')
                        ->where('buyers.first_name','like','%'.$search.'%')
                        ->orWhere('buyers.last_name','like','%'.$search.'%')
                        ->orWhere('users.email','like','%'.$search.'%')
                        ->orWhere('buyers.birth_date','like','%'.$search.'%')
                        ->orWhere('buyers.mobile','like','%'.$search.'%')
                        ->orWhere('users.name','like','%'.$search.'%')
                        ->paginate(16);

                        // dd($customers);
                        
        return view($this->path.'Buyers.search',compact('buyers'));
    }


    //Data Entry
    public function dataEntries()
    {
        $data = DataEntry::paginate(16);
        return view($this->path.'DataEntry.index',compact('data'));
    }

    public function createdataEntries()
    {
        return view($this->path.'DataEntry.create');
    }

    public function storedataEntries(Request $request)
    {
        $request->validate([
            'first_name'                                    => 'required|max:255|min:2',
            'last_name'                                     => 'required|max:255|min:2',
            'email'                                         => 'required|email|unique:users',
            'gender'                                        => 'required',
            'mobile'                                        => 'required',
            'password'                                      => 'required|max:10|min:6|confirmed',
        ]);


        $user = new User();
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        

        $data = new DataEntry();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->birth_date = $request->birth_date;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;
        $data->user_id = $user->id;
        $data->save();

        if (Role::where('name','Data Entry')->count() > 0) {
            $user->assignRole('Data Entry');
        }else{
            Role::create(['name' => 'Data Entry']);
            $user->assignRole('Data Entry');
        }

        return redirect()->route('dataentry')->with('success',__('tr.Data Entry Data Saved Successfully'));


    }

    public function showdataEntries($id)
    {
        $data = DataEntry::findOrfail($id);
        return view($this->path.'DataEntry.show',compact('data'));
    }

    public function editdataEntries($id)
    {
        $data = DataEntry::findOrfail($id);
        $user = User::findOrfail($data->user_id);
        return view($this->path.'DataEntry.edit',compact('data'));
    }

    public function updatedataEntries(Request $request)
    {
        $data = DataEntry::findOrfail($request->data_id);
        $user = User::findOrfail($buyer->user_id);

        $request->validate([
            'first_name'                                    => 'required|max:255|min:2',
            'last_name'                                     => 'required|max:255|min:2',
            'email'                                         => 'unique:users,email,'.$user->id,
            'gender'                                        => 'required',
            'mobile'                                        => 'required',
            'password'                                      => 'confirmed',
        ]);

        
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        if ($user->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->birth_date = $request->birth_date;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;
        $data->user_id = $user->id;
        $data->save();

        return redirect()->route('dataentry')->with('success',__('tr.Data Entry Data Saved Successfully'));


    }

    public function destroydataEntries($id)
    {
        $data = DataEntry::findOrfail($id);
        $user = User::findOrfail($data->user_id);

        $data->delete();
        $user->delete();

        return redirect()->route('dataentry')->with('success',__('tr.Data Entry Deleted Successfully'));
    }

    public function searchdataEntries(Request $request)
    {
        $search = $request->search;
        $data = DataEntry::select('data_entries.id as data_id',
                                 'data_entries.first_name',
                                 'data_entries.last_name',
                                 'data_entries.gender',
                                 'data_entries.birth_date',
                                 'data_entries.mobile',
                                 'users.id as user_id',
                                 'users.email',
                                 'users.name as user_name')
                        ->join('users','users.id','data_entries.user_id')
                        ->where('data_entries.first_name','like','%'.$search.'%')
                        ->orWhere('data_entries.last_name','like','%'.$search.'%')
                        ->orWhere('users.email','like','%'.$search.'%')
                        ->orWhere('data_entries.birth_date','like','%'.$search.'%')
                        ->orWhere('data_entries.mobile','like','%'.$search.'%')
                        ->orWhere('users.name','like','%'.$search.'%')
                        ->paginate(16);

                        // dd($customers);
                        
        return view($this->path.'DataEntry.search',compact('data'));
    }
}
