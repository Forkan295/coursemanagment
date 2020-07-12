<?php

namespace App\Http\Controllers\Student;

use App\Content;
use App\Student;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    
    public function profile()
    {
        $id = auth()->guard('student')->user()->id;
        $data['student'] = Student::whereId($id)->first();

        $batch = $data['student']->batch_id;
        $course = $data['student']->course_id;

        $data['schedule'] = Schedule::where('batch_id', $batch)
            ->where('course_id', $course)
            ->first();
            
        return view('public.student.profile',$data);
    }

    public function recentCourse()
    {
        $student = auth()->guard('student')->user();
        // dd($student);
        $data['paginate'] = 5;
        $data['contents'] = Content::where('course_id',$student->course_id)
                                    ->where('batch_id',$student->batch_id)
                                    ->latest()
                                    ->paginate($data['paginate']);

        $data['student'] = auth()->guard('student')->user();

        return view('public.student.recent-course',$data);
    }

    public function contentView($id)
    {
        $user = auth()->guard('student')->user();

        $data['content'] = Content::whereId($id)
                                    ->where('course_id',$user->course_id)
                                    ->where('batch_id',$user->batch_id)
                                    ->first();

        if(!$data['content'])
        {
           return abort(404);
        }
        return view('public.student.content-view',$data);
    }

    // public function forgotPwd()
    // {

    // }
}
