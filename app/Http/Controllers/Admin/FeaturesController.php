<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['features'] = Feature::all();
        // dd($data['features']);

        return view('dashboard.features.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'icon_name'=>'required|max:30',
            'title'=>'required|max:50',
            'description'=>'required|max:191',
            ]);

            //   dd($request->all());
        $feature = new Feature();
        $feature->icon_name = $request->icon_name;
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->status = $request->status;
        $feature->save();
        toast('Feature created succesfully','success');
        return redirect()->back();

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
        'icon_name'=>'required|max:30',
        'title'=>'required|max:50',
        'description'=>'required|max:191',
        ]);

       $feature = Feature::where('id', $id)->first();
       $feature->icon_name = $request->icon_name;
       $feature->title = $request->title;
       $feature->description = $request->description;
       $feature->status = $request->status;
       $feature->save();
       toast('Feature updates succesfully','success');
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

    }
    public function delete($id)
    {

        $feature = Feature::where('id',$id)->first();
        $feature->delete();
        toast('Feature has been deleted succesfully','success');
        return redirect()->back();

    }
}
