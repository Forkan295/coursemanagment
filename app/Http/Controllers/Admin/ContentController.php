<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\Course;
use App\Content;
use App\Student;
use App\Attribute;
use App\Events\SendTextMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    
    public function index()
    {
        $data['contents'] = Content::latest()->get();
        return view('dashboard.contents.index',$data);
    }
    
    public function create()
    {
        $data['courses'] = Course::all();
        $data['batches'] = Batch::all();

        return view('dashboard.contents.create',$data);
    }

    public function edit($id)
    {
        $data['content'] = Content::whereId($id)->first();
        $data['courses'] = Course::all();
        $data['batches'] = Batch::all();
        $data['attributes'] = Attribute::where('attributable_id', $data['content']->course_id )->get();
        // dd($data['attributes']);
        return view('dashboard.contents.edit',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
       $request->validate([
           'lecture' =>'required|numeric',
           'content_title' =>'required|max:150',
           'video_embed' =>'required',
           'course_id' =>'required',
           'batch_id' =>'required',
           'is_public' =>'required',
       ]);  

        $content = new Content();
        $content->lecture = $request->lecture;
        $content->content_title = $request->content_title;
        $content->video_embed = $request->video_embed;
        $content->content_description = $request->content_description;
        $content->course_id = $request->course_id;
        $content->batch_id = $request->batch_id;
        $content->is_public = $request->is_public;
        // $content->content_image = $image;
        $content->save();

        $content->attributes()->attach($request->attribute_id);

        // Notify students by text message
        $students = Student::where('course_id', $request->course_id)
                             ->where('batch_id', $request->batch_id)
                             ->get()
                             ->toArray();
        $phone = "";   
        foreach($students as $student)
        {
            $phone .= $student['phone'].',';
        }
        $phone = rtrim($phone, ",");
        
        $message =  "Lecture ".$content->lecture . "'s video has been uplaoded\n";
        $message .= "DCODEA IT INSTITUTE";

        event(new SendTextMessage($phone, $message));


        toast('class content created successfully');
        return redirect()->route('admin.content');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lecture' =>'required|numeric',
            'content_title' =>'required|max:150',
            'video_embed' =>'required',
            'course_id' =>'required',
            'batch_id' =>'required',
            'is_public' =>'required',
        ]);  
 
         $content =  Content::whereId($id)->first();
         $content->lecture = $request->lecture;
         $content->content_title = $request->content_title;
         $content->video_embed = $request->video_embed;
         $content->content_description = $request->content_description;
         $content->course_id = $request->course_id;
         $content->batch_id = $request->batch_id;
         $content->is_public = $request->is_public;
         $content->save();

         $content->attributes()->sync($request->attribute_id);

         toast('Content updated successfully', 'success');
         return redirect()->back();
    }
    

    public function getAttrByCourse(Request $request)
    {
        $data['attributes'] = Attribute::where('attributable_id', $request->course_id)->get();

        // return $data['attributes'];

        return view('dashboard.parts.attr', $data);
    }
}
