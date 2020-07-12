<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
// use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    
    public function index()
    {
       $data['user'] = User::whereId(auth()->user()->id)->first();
       return view('dashboard.users.profile',$data);
    }

    public function edit()
    {
        $data['user'] = User::whereId(auth()->user()->id)->first();
        return view('dashboard.users.edit-profile',$data);
    }

    public function password()
    {
        return view('dashboard.users.change-password');
    }

    public function changePassword(Request $request)
    {
       $request->validate([
           'current_password' => 'required',
           'password' => 'required|confirmed|min:6',
       ]);

       $user = User::whereId(auth()->user()->id)->first();

       if( !Hash::check($request->current_password, $user->password)  )
       {
           toast('Incorrect password.','error');
           return redirect()->back();
       }

       $user->password = bcrypt($request->password);
       $user->save();
       toast('Your password has been updated successfully.','success');
       return redirect()->route('user.profile');

    }

    public function update(Request $request)
    {
       $request->validate([
           'name' => 'required|max:100',
           'phone' => 'required|max:15',
           'address' => 'required|max:191',
           'city' => 'required|max:50',
           'postal_code' => 'required|max:20',
       ]);

        $user = User::whereId( auth()->user()->id )->first();

        if ($request->hasFile('avatar')) {

            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
     

            if($user->avatar != null)
            {
                if(Storage::disk('public')->exists('users/'.$user->avatar))
                {
                    Storage::disk('public')->delete('users/'.$user->avatar);
                }
            }

            $file = $request->file('avatar');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_ext;

            if (!Storage::disk('public')->exists('users')) {
                Storage::disk('public')->makeDirectory('users');
            }

            $save = 'storage/users/' . $file_name;
            Image::make($file)->fit(220, 220)->save($save);
        } else {
            $file_name =  $user->avatar;
        }
        
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->avatar = $file_name;
        $user->save();
        toast('Your profile has been updated successfully', 'success');
        return redirect()->route('user.profile');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('institute.login');
    }
}
