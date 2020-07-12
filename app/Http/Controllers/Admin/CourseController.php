<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $data['courses'] = Course::latest()->get();
        return view('dashboard.institute.course.course', $data);
    }

    public function create()
    {
        return view('dashboard.institute.course.course-create');
    }
    
    public function store(Request $request)
    {
        // dd($request->attribute);

        $request->validate([
            'course_name' => 'required|max:180|unique:courses,course_name',
            'course_title' => 'required',
            'course_fees' => 'required',
            'admission_fees' => 'required',
            'course_period' => 'required|max:50',
            'is_active' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $request->validate([
             "image" => 'image|mimes:jpeg,png,jpg|max:6072',
            ]);

            if(!Storage::disk('public')->exists('courses'))
            {
                Storage::disk('public')->makeDirectory('courses');
            } 
            
            $file = $request->file('image');
            $file_ext = $file->getClientOriginalExtension();
            $image = 'image_'.time().'.'.$file_ext;

            $save = 'storage/courses/'. $image;

            Image::make($file)->fit(500,300)->save($save);
        }
        else
        {
            $image = null;
        }

        $slug = strtolower( str_slug( $request->course_name, '-' ) );

        $course = Course::create([
            'course_name' => $request->course_name,
            'course_title' => $request->course_title,
            'course_slug' => $slug,
            'course_fees' => $request->course_fees,
            'admission_fees' => $request->admission_fees,
            'course_description' => $request->course_description,
            'course_period' => $request->course_period,
            'is_active' => $request->is_active,
            'image' => $image,
        ]);
     
        foreach($request->attribute as $attr)
        {
           Attribute::create([
               'attribute' => $attr,
               'attributable_id' => $course->id,
               'attributable_type' => "App\Course"
           ]);
        }

        toast('New course created.', 'success');
        return redirect()->route('course.index');

    }

    public function edit($id)
    {
        $data['course'] = Course::with('attributes')->whereId($id)->first();

        // dd($data['course']);
        return view('dashboard.institute.course.course-edit', $data);
    }

    public function update(Request $request, $id)
    {

        
        $request->validate([
            'course_name' => 'required|max:180|unique:courses,course_name,'.$id,
            'course_title' => 'required',
            'course_fees' => 'required',
            'admission_fees' => 'required',
            'course_period' => 'required|max:50',
            'is_active' => 'required',
        ]);

        $course = Course::with('attributes')->whereId($id)->first();

        // dd(Storage::disk('public')->exists('courses/'.$course->course));

        if($request->hasFile('image'))
        {
            $request->validate([
             "image" => 'image|mimes:jpeg,png,jpg|max:6072',
            ]);

            if($course->image != null)
            {
                if(Storage::disk('public')->exists('courses/'.$course->image))
                {
                    Storage::disk('public')->delete('courses/'.$course->image);
                }
            }
            
            $file = $request->file('image');
            $file_ext = $file->getClientOriginalExtension();
            $image = 'image_'.time().'.'.$file_ext;

            $save = 'storage/courses/'. $image;

            Image::make($file)->fit(500,300)->save($save);
        }
        else
        {
            $image = $course->image;
        }

        $course->course_name = $request->course_name;
        $course->course_title = $request->course_title;
        $course->course_fees = $request->course_fees;
        $course->admission_fees = $request->admission_fees;
        $course->course_description = $request->course_description;
        $course->course_period = $request->course_period;
        $course->is_active = $request->is_active;
        $course->image = $image;
        $course->save();

        $attributes = Attribute::where('attributable_id', $id)->delete();

        foreach($request->attribute as $attr)
        {
           Attribute::create([
               'attribute' => $attr,
               'attributable_id' => $course->id,
               'attributable_type' => "App\Course"
           ]);
        }

        // $data = $request->attribute;

        // $newAttr = array_filter( $data, function($attr) { 
        //             return !is_numeric($attr);
        //         });


        // if(count($newAttr) > 0)
        // {
        //     foreach($newAttr as $attr)
        //     {
        //        Attribute::create([
        //            'attribute' => $attr,
        //            'attributable_id' => $course->id,
        //            'attributable_type' => "App\Course"
        //        ]);
        //     }
        // }


        // $oldAttr = array_filter( $data, function($attr) { 
        //             return is_numeric($attr);
        //         });

        // if(count($oldAttr) > 0)
        // {
        //     $course->attributes()->saveMany($oldAttr);
        // }


        toast('Course updated successfully.', 'success');
        return redirect()->back();

    }
}
