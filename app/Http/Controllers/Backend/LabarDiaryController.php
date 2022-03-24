<?php

namespace App\Http\Controllers\Backend;

use App\Models\LabarDiary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class LabarDiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $labarDiaries = LabarDiary::query();

        if ($request->searchKeyword) {
            $labarDiaries->where('title',  'LIKE', "%$request->searchKeyword%");
        }

        $labarDiaries = $labarDiaries->orderBy('title')->paginate(10);

        return view('backend.labar_diary.index', compact('labarDiaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.labar_diary.create');
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
            'short_description' => 'required',
            'video' => 'required',
            'status' => 'required|in:Active,Inactive',
        ]);

        $labarDiary = new LabarDiary();
        $labarDiary->title = $request->title;
        $labarDiary->short_description = $request->short_description;
        $labarDiary->video = $request->video;
        $labarDiary->status = $request->status;
        $labarDiary->save();
        
        Alert::toast('Labar diary successfully created', 'success');

        return redirect()->route('admin.labar-diary.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabarDiary  $labarDairy
     * @return \Illuminate\Http\Response
     */
    public function show(LabarDiary $labarDiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabarDairy  $labarDiary
     * @return \Illuminate\Http\Response
     */
    public function edit(LabarDiary $labarDiary)
    {
        return view('backend.labar_diary.edit', compact('labarDiary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabarDairy  $labarDiary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabarDiary $labarDiary)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'short_description' => 'required',
            'video' => 'required',
            'status' => 'required|in:Active,Inactive',
        ]);

        $labarDiary->title = $request->title;
        $labarDiary->short_description = $request->short_description;
        $labarDiary->video = $request->video;
        $labarDiary->status = $request->status;
        $labarDiary->save();
        
        Alert::toast('Labar diary successfully updated', 'success');

        return redirect()->route('admin.labar-diary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabarDairy  $labarDairy
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabarDiary $labarDiary)
    {
        $labarDiary->delete();

        Alert::toast('Labar diary successfully deleted', 'success');

        return redirect()->route('admin.labar-diary.index');
    }
}
