<?php

namespace App\Http\Controllers\Admin;

use App\Day;
use App\Batch;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::all();
        $data['batches'] = Batch::all();
        $data['schedules'] = Schedule::with('batch')->orderBy('batch_id')->get();
        $data['days'] = Day::all();
        return view('dashboard.institute.schedule', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'batch_id' => 'required',
            'course_id' => 'required',
            'day_id' => 'required',
        ]);

        $schedule = Schedule::where('batch_id', $request->batch_id)
        ->where('course_id', $request->course_id)
        ->first();
        
        if($schedule){
            toast('Schedule for same ( batch & course ) are already exist.' ,'error'); 
            return redirect()->back();
        }

        $data = new Schedule();
        $data->batch_id = $request->batch_id;
        $data->course_id = $request->course_id;
        $data->time = $request->time;
        $data->save();

        $data->days()->attach($request->day_id);

        toast('Schedule created successfully.', 'success');
        return redirect()->back();
    }


    public function edit($id)
    {
        $data['batches'] = Batch::all();
        $data['days'] = Day::all();
        $data['schedule'] = Schedule::with('days')->whereId($id)->first();
        return view('dashboard\institute\schedule-edit', $data); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day_id' => 'required',
            'time' => 'required',
        ]);

        $schedule = Schedule::whereId($id)->first();
        $schedule->time = $request->time;
        $schedule->save();
        $schedule->days()->sync($request->day_id);

        toast('Schedule updated successfully.', 'suyccess');
        return redirect()->route('schedule.index');
    }

    public function destroy($id)
    {
       $schedule = Schedule::whereId($id)->first(); 
       $schedule->delete();

       $schedule->days()->detach();

       toast('Schedule deleted successfully.','success');
       return redirect()->back();
    }
}
