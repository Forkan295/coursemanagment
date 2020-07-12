<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }
    
    function guard()
    {
        return Auth::guard('student');
    }
    
    function studentLogin()
    {
        return view('public.student-login');
    }

    function authLogin(Request $request)
    {
        // dd($request->all());
        if($this->guard()->attempt($request->only(['phone', 'password'])))
        {
            return redirect('/'); 
        }

        return redirect()->back();
    }
}
