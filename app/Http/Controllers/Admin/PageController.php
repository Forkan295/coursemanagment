<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::all();
        // dd($data['pages']);
        return view('dashboard.pages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'page_title'=>'required|unique:pages,page_title',
            'page_description'=>'required',
            'meta_title'=>'max:191',
            'meta_keyword'=>'max:191',
        ]);

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_ext;

            if (!Storage::disk('public')->exists('page')) {
                Storage::disk('public')->makeDirectory('page');
            }

            $save = 'storage/page/' . $file_name;
            Image::make($file)->fit(1920,717)->save($save);
        } else {
            $file_name = null;
        }
        

        $page = new Page;
        $page->page_title = $request->page_title;

        if($request->page_slug)
        {
            $slug = strtolower(str_slug($request->page_slug));
        }
        else 
        {
            $slug = strtolower(str_slug($request->page_title));
        }
        
        $page->page_slug = $slug;
        $page->page_description = $request->page_description;
        $page->page_status = $request->page_status;
        $page->featured_image = $file_name;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyword;
        $page->meta_description = $request->meta_description;
        $page->show_main_menu = $request->show_main_menu;
        $page->show_footer = $request->show_footer;
        $page->save();
        toast('page has been saved succesfully','success');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['page'] = Page::where('id',$id)->first();
       return view('dashboard.pages.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'page_title'=>'required|unique:pages,page_title,'.$id,
            'page_description'=>'required',
            'meta_title'=>'max:191',
            'meta_keyword'=>'max:191',
        ]);

        // dd($request->all());
        $page = Page::where('id',$id)->first();

        if($request->hasFile('featured_image'))
        {
            $request->validate([
             "featured_image" => 'image|mimes:jpeg,png,jpg|max:6072',
            ]);

            if($page->featured_image != null)
            {
                if(Storage::disk('public')->exists('page/'.$page->featured_image))
                {
                    Storage::disk('public')->delete('page/'.$page->featured_image);
                }
            }

            $file = $request->file('featured_image');
            $file_ext = $file->getClientOriginalExtension();
            $image = time().'.'.$file_ext;

            $save = 'storage/page/'. $image;

            Image::make($file)->fit(1920,717)->save($save);
        }
        else
        {
            $image = $page->featured_image;
        }

        $page->page_title = $request->page_title;

        if($request->page_slug)
        {
            $slug = strtolower(str_slug($request->page_slug));
        }
        else 
        {
            $slug = strtolower(str_slug($request->page_title));
        }
        

        $page->page_slug = $slug;
        $page->page_description = $request->page_description;
        $page->page_status = $request->page_status;
        $page->featured_image = $image;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyword;
        $page->meta_description = $request->meta_description;
        $page->show_main_menu = $request->show_main_menu;
        $page->show_footer = $request->show_footer;
        $page->save();
        toast('page has been updated succesfully','success');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);

        $page = Page::where('id',$id)->first();

        if($page->featured_image != null)
        {
            if(Storage::disk('public')->exists('page/'.$page->featured_image))
            {
                Storage::disk('public')->delete('page/'.$page->featured_image);
            }
        }

        $page->delete();

        toast('Page deleted successfully', 'success');
        return redirect()->route('pages.index');
    }
}
