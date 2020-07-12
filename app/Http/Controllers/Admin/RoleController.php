<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::latest()->get();
        $data['permissions'] = Permission::latest()->get();
        return view('dashboard.role.index', $data);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'role' => 'required|max:50|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->role
        ]);

        $role->syncPermissions($request->permissions);

        toast('Role created successfully.', 'success');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|max:50|unique:roles,name,'.$id,
            'permissions' => 'required',
        ]);

        $role = Role::whereId($id)->first();
        $role->name = $request->role;
        $role->save();

        $role->syncPermissions($request->permissions);

        toast('Role updated successfully.', 'success');
        return redirect()->back();  
        }
}
