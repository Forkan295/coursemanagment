<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\StudentRecord;

class StudentController extends Controller
{
    
    public function asignStudent(Request $request, $id)
    {
       $request->validate([
           'course_id' => 'required',
           'batch_id' => 'required',
           'paid' => 'required',
       ]);
       $student = Student::whereId($id)->first();

    //    dd($student->batch_id);
       
       if(!$student)
       {
          return abort(500);
       }

       $record = new StudentRecord();
       $record->student_id = $id;
       $record->course_id = $student->course_id;
       $record->batch_id = $student->batch_id;
       $record->save();

       $student->course_id = $request->course_id;
       $student->batch_id = $request->batch_id;
       $student->payment_status = false;
       $student->paid = $request->paid;
       $student->discount = 0;
       $student->save();

       toast('This student asigned to another course successfully.', 'success');
       return redirect()->back();

    }

    public function courseAdmissionFees(Request $request)
    {
       $course = Course::whereId($request->course_id)->first();
       return $course->admission_fees;
    }
}
