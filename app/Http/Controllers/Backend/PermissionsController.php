<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsController extends Controller
{
    public $path = 'backend.pages.';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permissions = Permission::all();
        return view($this->path.'Permissions.index',compact('permissions'));
    }

    
    public function create()
    {
        return view($this->path.'Permissions.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255|min:2',
        ]);

        Permission::create(['name' => $request->name]);
        return redirect()->route('permissions')->with('success',__('tr.Permissions Added'));
    }

   
    public function show($id)
    {
        //
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|max:255|min:2',
        ]);

        $role = Permission::findOrfail($request->id);
        $role->name = $request->name;
        $role->save();
        return redirect()->route('permissions')->with('success',__('tr.Permission Updated'));
    }

   
    public function destroy($id)
    {
        $permissions = Permission::findOrfail($id);
        $permissions->delete();
        return redirect()->route('permissions')->with('success',__('tr.Permissions Deleted'));
    }
}
