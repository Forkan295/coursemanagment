<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RemoveController extends Controller
{
    
    public function index()
    {
        $data['schedule'] = Schedule::where('type', 'schedule')->latest()->get();
        $data['time'] = Schedule::where('type', 'time')->latest()->get();
        return view('dashboard.institute.time-schedule', $data);
    }
    public function edit($id)
    {
        $data['schedule'] = Schedule::whereId($id)->first();
        return view('dashboard.institute.schedule-edit', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule' => 'required|max:50',
            'type' => 'required|max:50'
        ]);

        Schedule::create($request->all());

        toast('success', ucfirst($request->type) . ' created.', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'schedule' => 'required|max:50',
            ]);

        // dd($id);

        $schedule = Schedule::whereId($id)->first();
        $schedule->schedule = $request->schedule;
        $schedule->save();

        toast('success', ucfirst($request->type) . ' updated.', 'success');
        return redirect()->route('schedule.index');
    }
}
