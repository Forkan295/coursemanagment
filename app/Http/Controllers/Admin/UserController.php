<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Student;
use Illuminate\Http\Request;
use App\Events\SendTextMessage;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Notifications\newUserEmail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::latest()->get();
        $data['roles'] = Role::all();
        $data['pageTitle'] = "All Users";

        return view('dashboard.users.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email|max:100',
            'role' => 'required',
        ]);

        $user_token = md5(rand(1, 10) . microtime());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->role == 1) {
            $admin_status = true;
        } else {
            $admin_status = false;
        }

        $user->admin_status = $admin_status;
        $user->user_token = $user_token;
        $user->save();

        $user->assignRole($request->role);
        $user->notify(new newUserEmail($user));

        toast('User created successfully.', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users,email,'.$id,
            'phone' => 'required|max:15',
            'address' => 'required|max:180',
            'city' => 'required|max:80',
            'postal_code' => 'max:20',
            'role' => 'required',
        ]);

        $user = User::whereId($id)->first();

        if ($request->hasFile('avatar')) {

            if ( $user->avatar != null) 
            {

                if (Storage::disk('public')->exists('users/' . $user->avatar)) 
                {
                    Storage::disk('public')->delete('users/' . $user->avatar);
                }
            }



            if (!Storage::disk('public')->exists('users')) {
                Storage::disk('public')->makeDirectory('users');
            }


            $file = $request->file('avatar');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_ext;

            $save = 'storage/users/' . $file_name;

            $image = Image::make($file)->fit(220, 220)->save($save);

        } else {
            $file_name = $user->avatar;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->account_status = $request->account_status;
        
        if($request->role == 1)
        {
            $admin_status = true;
        }
        else 
        {
            $admin_status = false;
        }

        $user->admin_status = $admin_status;

        $user->avatar = $file_name;
        $user->save();

        $user->syncRoles($request->role);

        // $message = "Hello " . $user->name;
        // $message .= "\nuser ID: " . $user->user_id;
        // $message .= "\nPassword: " . $password;
        // $message .= "\nBest Regards,,";
        // $message .= "\nDcodea IT Institute";

        // event(new SendTextMessage($user->phone, $message));

        toast('User updated successfully.', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
