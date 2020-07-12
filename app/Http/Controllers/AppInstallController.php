<?php

namespace App\Http\Controllers;

use App\User;
use App\System;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class AppInstallController extends Controller
{

    function dbSetupForm()
    {
        return view('install.install-db');
    }

    function dbSetup(Request $request)
    {
        $request->validate([
            'db_name' => 'required',
            'db_username' => 'required',
        ]);


        setEnv('DB_DATABASE', $request->db_name);
        setEnv('DB_USERNAME', $request->db_username);
        setEnv('DB_PASSWORD', $request->db_password);

        // setEnv('APP_DEBUG', $request->app_debugger);

        if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) 
        {
            $protocol = "https://";
        }
        else 
        {
            $protocol = "http://";
        }
        $host = $protocol.$_SERVER['SERVER_NAME'].'/';
        setEnv('APP_URL', $host);

        return redirect('/');
    }


    function installMigrationForm()
    {
        return view('install.install-migration');
    }


    function installMigration(Request $request)
    {
        Artisan::call('migrate');

        return redirect()->route('app.install.admin');
    }




    function AdminForm()
    {
        if (!Schema::hasTable('users')) {

           return redirect()->route('app.install.migration');
        }
        
        return view('install.install-admin');
    }

    function appInstallAdmin(Request $request)
    {
        //   dd($request->all());

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:150',
            'password' => 'required|confirmed',
        ]);

        // if (!Schema::hasTable('users')) {
        //     Artisan::call('migrate');
        // }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin_status = true;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->user_id = $user->id + 100;
        $user->save();

        $permissions = [
            'View Applicants',
            'View Batch',
            'View Schedule',
            'View Courses',
            'View Student',
            'View Trainers',
            'View Users',
            'View Permissions',
            'View Roles',
            'Delete Applicant',
            'Admit Student',
            'Update Student',
            'Create User',
            'Update User',
            'Delete User',
            'Create Role',
            'Update Role',
            'Delete Role',
            'Create Course',
            'Update Course',
            'Create Batch',
            'Update Batch',
            'Delete Batch',
            'Create Schedule',
            'Update Schedule',
            'Delete Schedule',
            'Update Payment',
            'Update System',
        ];

        foreach ($permissions as $permission) {
            $perm = new Permission();
            $perm->name = $permission;
            $perm->save();
        }


        $role = new Role();
        $role->name = "Administrator";
        $role->save();

        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $user->assignRole($role);

        toast('Administrator created successfully. please login to dashboard', 'success');
        return redirect()->route('app.install.system');
    }


    function systemForm()
    {
        return view('install.install-system');
    }

    function appInstallSystem(Request $request)
    {
        $request->validate([
            'app_name' => 'required|max:100',
            'website_title' => 'required|max:100',
            'website_slogan' => 'required|max:150',
            'primary_contact' => 'required|max:15',
            'contact_email' => 'required|max:100',
        ]);

        $system = new System();
        $system->app_name = $request->app_name; 
        $system->website_title = $request->website_title; 
        $system->website_slogan = $request->website_slogan; 
        $system->primary_contact = $request->primary_contact; 
        $system->contact_email = $request->contact_email;
        $system->save();
        
        toast('System created successfully.', 'success');
        return redirect('/institute/login');
    }
}
