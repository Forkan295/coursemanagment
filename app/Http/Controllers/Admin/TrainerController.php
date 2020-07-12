<?php

namespace App\Http\Controllers\Admin;

use App\Trainer;
use Illuminate\Http\Request;
use App\Events\SendTextMessage;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    public function index()
    {
        $data['trainers'] = Trainer::latest()->get();

        $data['pageTitle'] = "All Trainers";

        return view('dashboard.trainer.index', $data);
    }

        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|unique:trainers,email|max:15',
            'address' => 'required|max:180',
            'city' => 'required|max:80',
            'zip' => 'max:20',
            'skills' => 'required|max:190',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_ext;

            if (!Storage::disk('public')->exists('trainers')) {
                Storage::disk('public')->makeDirectory('trainers');
            }
            $save = 'storage/trainers/' . $file_name;
            Image::make($file)->fit(220, 220)->save($save);
        } else {
            $file_name = 'default.png';
        }

        $trainer = new Trainer();
        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->phone = $request->phone;
        $trainer->address = $request->address;
        $trainer->city = $request->city;
        $trainer->zip = $request->zip;
        $trainer->skills = $request->skills;
        $trainer->avatar = $file_name;
        $trainer->save();

        $trainer->trainer_id = $trainer->id+100;
        $trainer->save();

        // $message = "Hello ". $trainer->name;
        // $message .= "\nuser ID: ". $trainer->user_id;
        // $message .= "\nPassword: ". $password;
        // $message .= "\nBest Regards,,";
        // $message .= "\nDcodea IT Institute";

        // event(new SendTextMessage($trainer->phone, $message));

        toast('Trainer created successfully.', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:trainers,email,'.$id,
            'phone' => 'required|max:15',
            'address' => 'required|max:180',
            'city' => 'required|max:80',
            'zip' => 'max:20',
        ]);
        
        $trainer = Trainer::whereId($id)->first();

        if ($request->hasFile('avatar')) {

            if ( $trainer->avatar != 'default.png') 
            {

                if (Storage::disk('public')->exists('trainers/' . $trainer->avatar)) 
                {
                    Storage::disk('public')->delete('trainers/' . $trainer->avatar);
                }
            }



            if (!Storage::disk('public')->exists('trainers')) {
                Storage::disk('public')->makeDirectory('trainers');
            }


            $file = $request->file('avatar');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_ext;

            $save = 'storage/trainers/' . $file_name;

            $image = Image::make($file)->fit(220, 220)->save($save);

        } else {
            $file_name = $trainer->avatar;
        }

        $trainer->name = $request->name;
        $trainer->email = $request->email;
        $trainer->phone = $request->phone;
        $trainer->address = $request->address;
        $trainer->city = $request->city;
        $trainer->zip = $request->zip;
        $trainer->skills = $request->skills;
        $trainer->avatar = $file_name;
        $trainer->save();

        // $message = "Hello " . $trainer->name;
        // $message .= "\nuser ID: " . $trainer->user_id;
        // $message .= "\nPassword: " . $password;
        // $message .= "\nBest Regards,,";
        // $message .= "\nDcodea IT Institute";

        // event(new SendTextMessage($trainer->phone, $message));

        toast('Trainer updated successfully.', 'success');
        return redirect()->back();
    }


}
