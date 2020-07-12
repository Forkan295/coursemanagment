<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Student;
use Illuminate\Http\Request;
use App\Events\SendTextMessage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ApplicationController extends Controller
{

    function index()
    {
        $data['courses'] = Course::where('is_active', true)->get();
        return view('welcome', $data);
    }

    function registrationForm()
    {
        $data['courses'] = Course::where('is_active', true)->get();
        return view('application-form', $data);
    }

    function add_register(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required|max:60', 
            'father_name' => 'required|max:60', 
            'gender' => 'required', 
            'phone' => 'required|numeric|unique:students,phone',
            'course_id' => 'required',
            'present_address' => 'required|max:180', 
            'postal_code' => 'required|max:50', 
            'email' => 'max:60|unique:registrations,email', 
            'facebook' => 'max:180',
        ]);

        $secret_code =  rand(10, 99).rand(10,99).rand(10,99);

        $message = "Hello " . $request->name.",,\n" . "your verification code: ". $secret_code . "\nBest regards,\nhttp://www.dcodea.com";
            
        event(new SendTextMessage($request->phone, $message));  

        $data = new Student();
        $data->name = $request->name;
        $data->father_name = $request->father_name;
        $data->gender = $request->gender;
        $data->phone = $request->phone;
        $data->course_id = $request->course_id;
        $data->present_address = $request->present_address;
        $data->postal_code = $request->postal_code;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->secret_code = $secret_code;

        $data->save();

        Session::flash('success', 'We have sent a verification sms to your phone. please verify your phone number by submit the 6 digit number.');

        return Redirect::route('verify.registration',  $request->phone);

        // dd($secret_code );
        
    }

    function verify_application($phone)
    {
        
        $app = Student::where('phone', $phone)->first();
        if ($app && $app->is_verified != true) 
        {            
            $data['phone'] = $phone;
            return view('verify',$data);
        }
        else
        {
            abort('404');
        }

    }

    function verify_register(Request $request)
    {
        // dd($request->app_id);

        $request->validate([
            'secret_code' => 'required'
        ]);

        $app =  Student::where('phone', $request->phone)
                                   ->where('secret_code', $request->secret_code)
                                   ->first();
   
        if($app &&  $app->is_verified == false)
        {
            $data = Student::where('phone',$request->phone)->first();
            $data->is_verified = true;
            $data->secret_code = null;
            $data->save();

            return redirect()->route('success.register', $request->phone);
        }   
        else
        {
            Session::flash('error', 'দুঃখিত!<br> আপনি ভুল ভেরিফিকেশন কোড সাবমিট করেছেন।');
            return redirect()->back();
        }

    }

    function successfully_registered($phone)
    {

        $app =  Student::where('phone', $phone)
                                   ->first();
        if ($app) 
        {            
            return view('successfull');
        }
        else
        {
            abort('404');
        }

    }

}
