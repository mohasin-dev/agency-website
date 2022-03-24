<?php

namespace App\Http\Controllers\Backend;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photoGalleries = PhotoGallery::query();

        if ($request->searchKeyword) {
            $photoGalleries->where('photo_title',  'LIKE', "%$request->searchKeyword%");
        }

        $photoGalleries = $photoGalleries->orderBy('photo_title')->paginate(10);

        return view('backend.photo_gallery.index', compact('photoGalleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.photo_gallery.create');
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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        $photoGallery = new PhotoGallery();

        if ($request->hasFile('photo')) {   
            $photoGallery->photo = $request->file('photo')->store('photo_gallery'); 
        }

        $photoGallery->photo_title = $request->photo_title;
        $photoGallery->status = $request->status;
        $photoGallery->save();
        
        Alert::toast('photo gallery image successfully created', 'success');

        return redirect()->route('admin.photo-gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoGallery $photoGallery)
    {
        return view('backend.photo_gallery.edit', compact('photoGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoGallery $photoGallery)
    {
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($request->hasFile('photo')) { 
              
            if (Storage::exists($photoGallery->photo)) {
                Storage::delete($photoGallery->photo);
            }

            $photoGallery->photo = $request->file('photo')->store('photo_gallery'); 
        }

        $photoGallery->photo_title = $request->photo_title;
        $photoGallery->status = $request->status;
        $photoGallery->save();
        
        Alert::toast('photo gallery image successfully updated', 'success');

        return redirect()->route('admin.photo-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoGallery $photoGallery)
    {
        if (Storage::exists($photoGallery->photo)) {
            Storage::delete($photoGallery->photo);
        }

        $photoGallery->delete();

        Alert::toast('Photo successfully deleted', 'success');

        return redirect()->back();
    }
}
