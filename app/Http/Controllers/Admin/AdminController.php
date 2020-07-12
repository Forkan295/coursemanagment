<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = new Carbon; //  DateTime string will be 2014-04-03 13:57:34
        $date->subWeek(); // or $date->subDays(7),  2014-03-27 13:58:25

        $data['ApllicationInLast7dayes'] = Student::where('created_at', '>', $date->toDateTimeString())
                                ->where('is_admitted', false)
                                ->where('is_verified', true)
                                ->get()
                                ->count();

        $data['AdmittedInLast7dayes'] = Student::where('created_at', '>', $date->toDateTimeString())
                                ->where('is_admitted', true)
                                ->get()
                                ->count();

        $data['TotalStudents'] = Student::where('is_admitted', true)
                                ->get()
                                ->count();

        $data['UnverifiedApplicants'] = Student::where('is_verified', false)
                                        ->get()
                                        ->count();

        $data['students'] = Student::where('created_at', '>', $date->toDateTimeString())
            ->where('is_admitted', true)
            ->where('is_verified', true)
            ->get();

        $data['applicants'] = Student::where('created_at', '>', $date->toDateTimeString())
            ->where('is_admitted', false)
            ->where('is_verified', true)
            ->get();

        // dd($data);
        return view('dashboard.index', $data);
    }
}
