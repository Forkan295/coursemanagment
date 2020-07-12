<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\User;
use App\Batch;
use App\Course;
use App\Student;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\SendTextMessage;
use App\Http\Controllers\Controller;
use App\System;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ApplicantsController extends Controller
{
    
 // get all verified applicants
    public function verifiedApplicants() 
    {
        $data['applicants'] = Student::where('is_admitted', false)
            ->where('is_verified', true)
            ->get();

        $data['pageTitle'] = "Verfied Apllicants";

        return view('dashboard.applicants.applicants', $data);
    }

    // get all unverified applicants
    public function unverifiedApplicants()
    {
        $data['applicants'] = Student::where('is_admitted', false)
            ->where('is_verified', false)
            ->get();

        $data['pageTitle'] = "Unverfied Apllicants";
        return view('dashboard.applicants.applicants', $data);
    }

    // Show applicant details
    public function detailesApplicants($id)
    {
        // dd($id);

        $data['applicant'] = Student::with('course')->whereId($id)
            ->first();

        $data['batches'] = Batch::all();
        // $data['weeklySchedules'] = Schedule::where('type', 'schedule')->get();
        // $data['timeSchedules'] = Schedule::where('type', 'time')->get();


        if($data['applicant']->is_admitted != false)
        {
            abort(404);
        }
        $data['pageTitle'] = "Apllicant detailes";
        return view('dashboard.applicants.detailes', $data);   
    }

    // Save a applicant as student 
    public function admitApplicants(Request $request, $id)
    {
    //    dd($request->all());
        $request->validate([
            'paid' => 'required',
            'batch_id' => 'required',
            'student_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_ext;

            if (!Storage::disk('public')->exists('students')) {
                Storage::disk('public')->makeDirectory('students');
            }

            $save = 'storage/students/' . $file_name;
            Image::make($file)->fit(220, 290)->save($save);
        } else {
            $file_name = 'default.png';
        }

        $password = rand(1000, 9999) . rand(10, 99);

        $student = Student::whereId($id)->first();

        $student->password = bcrypt( $password );
        $student->paid = $request->paid;
        $student->batch_id = $request->batch_id;
        $student->student_image = $file_name;
        $student->is_admitted = true;
        $student->is_verified = true;
        $student->secret_code = null;
        $student->student_id = $student->id + 1000;
        $student->save();
        if ($student->paid == $student->course->course_fees) 
        {
            $student->payment_status = true;
        }
         else 
        {
            $student->payment_status = false;
        }
        $student->save();

        $system = System::first();

         if($system->sms_on_student_admission == true)
         {
             $message = "Hello ". $student->name; 
             if($student->paid >= $student->course->admission_fees)
             {
                 $message .= "\nFees ". $student->paid ." TK has been received."; 
             }
             else if($student->paid < $student->course->admission_fees) 
             {
                 $message .= "\nYou have to pay ". ( $student->course->admission_fees - $student->paid )." TK due admission fees.";
             }
             $message .= "\nLogin ID: $student->phone";
             $message .= "\nPassword: $password";
             $message .= "\nLogin URL: bit.ly/37aDxHb";
             $message .= "\nDCODEA IT INSTITUTE.";
             event( new SendTextMessage($student->phone, $message) );
         }

        toast('Student admitted successfully.', 'success');
        return redirect()->route('detailes.student', $id);
    }

    //Show All Student
    public function allStudents()
    {

        $data['students'] = Student::where('is_admitted', true)
            ->where('is_verified', true)
            ->get();

        $data['pageTitle'] = "All Students";

        return view('dashboard.students.students', $data);
    }

    //detailes of a student
    public function detailesStudent($id)
    {
        // dd('ok');
        $data['student'] = Student::with('course')->whereId($id)
            ->first();

        $batch = $data['student']->batch_id;
        $course = $data['student']->course_id;

        $data['schedule'] = Schedule::where('batch_id', $batch)
            ->where('course_id', $course)
            ->first();

        $data['courses'] = Course::all();
        $data['batches'] = Batch::where('completion_status', 0)->get();

        if($data['student']->is_admitted != true)
        {
            abort(404);
        }

        $data['pageTitle'] = "Student detailes";
        return view('dashboard.students.detailes', $data);

    }

    public function deleteStudent($id)
    {
        
        $student = Student::find($id);

        if ($student->student_image != 'default.png') {
            if (Storage::disk('public')->exists('students/' . $student->student_image)) {
                Storage::disk('public')->delete('students/' . $student->student_image);
            }
        }

        Student::destroy($id);

        Session::flash('success', 'Student has been deleted');

        return redirect()->route('home');
    }



    // Show student payment receipt
    public function receiptStudent($id)
    {
        $data['student'] = Student::with('course')->whereId($id)
            ->first();


        $batch = $data['student']->batch_id;
        $course = $data['student']->course_id;

        $data['schedule'] = Schedule::where('batch_id', $batch)
            ->where('course_id', $course)
            ->first(); 

        if ($data['student']->is_admitted != true) {
            abort(404);
        }

        // return view('dashboard.students.receiptpdf', $data);

        $data['pageTitle'] = "Student detailes";
        $pdf = PDF::loadView('dashboard.students.receiptpdf', $data);
        return $pdf->stream();
    }


    // page for Search student by filtering
    public function filterStudents()
    {
        $data['applicants'] = Student::where('is_admitted', true)
            ->where('is_verified', true)
            ->get();

        $data['courses'] = Course::all();
        $data['batches'] = Batch::all();
        $data['schedules'] = Schedule::all();

        $data['pageTitle'] = "Students by";

        return view('dashboard.students.filter-students', $data);  
    }

    // Search student by filtering
    public function SearchStudents(Request $request)
    {
        if($request->key == "course")
        {
            $data['students'] = Student::where('is_admitted', true)
                ->where('course_id', $request->id)  
                ->where('is_verified', true)
                ->get();

        }
        if($request->key == "batch")
        {
            $data['students'] = Student::where('is_admitted', true)
                ->where('batch_id', $request->id)  
                ->where('is_verified', true)
                ->get();
        }
  

        if ($request->key == "all") {
            $data['students'] = Student::where('is_admitted', true)
                ->where('is_verified', true)
                ->get();
        }

        return view('dashboard.parts.students-search', $data);
    }

    // New Student Admission form
    public function newAdmission()
    {
        $data['courses'] = Course::where('is_active', true)->get();
        return view( 'dashboard.students.new-admission', $data );
    }

    // Store Student Admission form
    public function registerNewAdmission(Request $request)
    {

        // dd('ok');

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
        $data->secret_code = null;
        $data->is_verified = true;

        $data->save();

        toast('new admission added successfully.', 'success');
        return Redirect::route('detailes.applicants', $data->id);
        // dd($secret_code );
    }

}
