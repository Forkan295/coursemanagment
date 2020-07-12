<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BatchController extends Controller
{
    
    public function index()
    {
        $data['batches'] = Batch::all();
        $data['courses'] = Course::all();
        return view('dashboard.institute.batch', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());  

        $request->validate([
           'batch' => 'required|numeric|unique:batches,batch|max:50'
        ]);

         $batch = new Batch();
         $batch->batch = $request->batch; 
         $batch->save();

        toast('New batch created.', 'success');
        return redirect()->back();
    }
    
    public function view($id)
    {
        $data['batch'] = Batch::whereId($id)->first();
        return view('dashboard.institute.batch-edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());  

        $request->validate([
           'batch' => 'required|numeric|max:50|unique:batches,batch,'.$id
         ]);
                      

         $batch = Batch::whereId($id)->first();
         $batch->batch = $request->batch; 
         $batch->save();
    
        toast('batch updated successfully.', 'success');
        return redirect()->back();
    }

    public function start($id)
    {
       $batch = Batch::whereId($id)->first();
       $batch->start_status = true;
       $batch->save();
       toast('Batch '. $batch->batch .' has been started.','success');
       return redirect()->back();
    }
    public function end($id)
    {
       $batch = Batch::whereId($id)->first();
       $batch->completion_status = true;
       $batch->save();
       toast('Batch '. $batch->batch .' has been ended.','success');
       return redirect()->back();
    }
}
