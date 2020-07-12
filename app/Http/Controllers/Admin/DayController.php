<?php

namespace App\Http\Controllers\Admin;

use App\Day;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DayController extends Controller
{
    public function index()
    {
        $data['days'] = Day::all();
        return view('dashboard.institute.day', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|max:50|unique:days,day',
            'comment' => 'max:190'
        ]);

        Day::create($request->all());

        toast('Day created successfully.', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|max:50|unique:days,day,'.$id,
            'comment' => 'max:190',
        ]);

        // dd($id);

        $day = Day::whereId($id)->first();
        $day->day = $request->day;
        $day->comment = $request->comment;
        $day->save();

        toast('Day updated successfully.', 'success');
        return redirect()->route('day.index');
    }
}
