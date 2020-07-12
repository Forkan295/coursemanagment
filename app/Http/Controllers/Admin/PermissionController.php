<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    
    public function index()
    {
        $data['permissions'] = Permission::latest()->get();
        return view('dashboard.permission.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required|max:50',
        ]);
        Permission::create([
          'name' => $request->permission
          ]);
        
        toast('Permission created successfully.','success');

        return redirect()->back();
    }
}
