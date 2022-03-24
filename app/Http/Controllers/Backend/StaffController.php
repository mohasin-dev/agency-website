<?php

namespace App\Http\Controllers\Backend;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staff = Staff::query();

        if ($request->searchKeyword) {
            $staff->where('name',  'LIKE', "%$request->searchKeyword%");
        }

        $staff = $staff->orderBy('order')->paginate(10);

        return view('backend.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'designation' => 'required|max:191',
            'order' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        $staff = new Staff();

        if ($request->hasFile('image')) {   
            $staff->image = $request->file('image')->store('staff'); 
        }

        $staff->name = $request->name;
        $staff->designation = $request->designation;
        $staff->order = $request->order;
        $staff->facebook_url = $request->facebook_url;
        $staff->twitter_url = $request->twitter_url;
        $staff->linkedin_url = $request->linkedin_url;
        $staff->instagram_url = $request->instagram_url;
        $staff->status = $request->status;
        $staff->save();
        
        Alert::toast('photo gallery image successfully created', 'success');

        return redirect()->route('admin.staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('backend.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'designation' => 'required|max:191',
            'order' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($request->hasFile('image')) {   
            
            if (Storage::exists($staff->image)) {
                Storage::delete($staff->image);
            }

            $staff->image = $request->file('image')->store('staff'); 
        }

        $staff->name = $request->name;
        $staff->designation = $request->designation;
        $staff->order = $request->order;
        $staff->facebook_url = $request->facebook_url;
        $staff->twitter_url = $request->twitter_url;
        $staff->linkedin_url = $request->linkedin_url;
        $staff->instagram_url = $request->instagram_url;
        $staff->status = $request->status;
        $staff->save();
        
        Alert::toast('photo gallery image successfully updated', 'success');

        return redirect()->route('admin.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        if (Storage::exists($staff->image)) {
            Storage::delete($staff->image);
        }

        $staff->delete();

        Alert::toast('Staff successfully deleted', 'success');

        return redirect()->back();
    }
}
