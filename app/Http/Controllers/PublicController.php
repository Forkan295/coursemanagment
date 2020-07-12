<?php

namespace App\Http\Controllers;

use App\Course;
use App\Content;
use App\Feature;
use App\Notifications\profileCreated;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
   function index()
   {
        $data['features'] = Feature::where('status',true)->latest()->get();
        $data['courses'] = Course::where('is_active', true)->inRandomOrder()->take(6)->get();
        $data['contents'] = Content::where('is_public', true)->latest()->get();
       return view('public.index',$data);
   }

   function defaultPage($slug)
   {
        $data['page'] = Page::where('page_status', true)->where('page_slug', $slug)->first();
        if(!$data['page'])
        {
          abort(404);
        }
        return view('public.default-page',$data);
   }

   function courses()
   {
       $data['courses'] = Course::where('is_active', true)->get();
       return view('public.courses',$data);
   }


   function contact()
   {
       return view('public.contact');
   }
   
   function courseSingle($slug)
   {
       $data['course'] = Course::where('course_slug', $slug)->first();
       return view('public.course-single',$data);
   }

   function apply()
   {
       $data['courses'] = Course::where('is_active', true)->get();
       return view('public.apply',$data);
   }


   function userActivation($token)
   {
        $user = User::where('user_token', $token)->first();

        if(!$user)
        {
           return abort(404);
        }

        return view('user\create-user', compact(['user', $user]));
   }

   function userActivate(Request $request, $token)
   {
        $request->validate([
           'password' => 'required|confirmed|min:6', 
        ]);
        
        $user = User::where('user_token', $token)->first();
        if(!$user)
        {
            return abort(404);
        }

        $user->user_id = $user->id+100;
        $user->password = bcrypt($request->password);
        $user->account_status = true;
        $user->user_token = null;
        $user->save();
        
        $user->notify( new profileCreated($user, $request->password) );
         
        toast('Your account has been activated successfully. please update your profile giving correct informations about you.', 'success');
        
        return redirect()->route('profile.edit');
   }

}
