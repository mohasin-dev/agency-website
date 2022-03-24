<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Ticketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ticketing = Ticketing::query();

        if ($request->searchKeyword) {
            $ticketing->where('title', 'LIKE', "%$request->searchKeyword%");
        }

        $ticketing = $ticketing->orderBy('title')->paginate(10);

        return view('backend.ticketing.index', compact('ticketing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.ticketing.create', compact('countries'));
    }

    /**
     * Store the blog details file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('ticketing/details');

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
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
            'title' => 'required|max:191',
            'country_id' => 'required',
            'details' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        $ticketing = new Ticketing();

        if ($request->hasFile('featured_image')) {
            $ticketing->featured_image = $request->file('featured_image')->store('ticketing');
        }

        $ticketing->title = $request->title;
        $ticketing->country_id = $request->country_id;
        $ticketing->short_description = $request->short_description;
        $ticketing->details = $request->details;
        $ticketing->is_featured = $request->is_featured;
        $ticketing->status = $request->status;
        $ticketing->save();

        Alert::toast('Ticketing successfully created', 'success');

        return redirect()->route('admin.ticketing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function show(Ticketing $ticketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticketing $ticketing)
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.ticketing.edit', compact('ticketing', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticketing $ticketing)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'country_id' => 'required',
            'details' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($request->hasFile('featured_image')) {

            if (Storage::exists($ticketing->featured_image)) {
                Storage::delete($ticketing->featured_image);
            }

            $ticketing->featured_image = $request->file('featured_image')->store('ticketing');
        }

        $ticketing->title = $request->title;
        $ticketing->country_id = $request->country_id;
        $ticketing->short_description = $request->short_description;
        $ticketing->details = $request->details;
        $ticketing->is_featured = $request->is_featured;
        $ticketing->status = $request->status;
        $ticketing->save();

        Alert::toast('Ticketing successfully updated', 'success');

        return redirect()->route('admin.ticketing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticketing  $ticketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticketing $ticketing)
    {
        if (Storage::exists($ticketing->featured_image)) {
            Storage::delete($ticketing->featured_image);
        }

        $ticketing->delete();

        Alert::toast('Ticketing successfully deleted', 'success');

        return redirect()->route('admin.ticketing.index');
    }
}
