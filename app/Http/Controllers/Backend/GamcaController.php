<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Gamca;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GamcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gamca = Gamca::query();

        if ($request->searchKeyword) {
            $gamca->where('title', 'LIKE', "%$request->searchKeyword%");
        }

        $gamca = $gamca->orderBy('title')->paginate(10);

        return view('backend.gamca.index', compact('gamca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.gamca.create', compact('countries'));
    }

    /**
     * Store the blog details file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('gamca/details');

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
            'status' => 'required|in:Active,Inactive',
        ]);

        $gamca = new Gamca();
        $gamca->title = $request->title;
        $gamca->country_id = $request->country_id;
        $gamca->short_description = $request->short_description;
        $gamca->details = $request->details;
        $gamca->status = $request->status;
        $gamca->save();

        Alert::toast('Gamca successfully created', 'success');

        return redirect()->route('admin.gamca.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gamca  $gamca
     * @return \Illuminate\Http\Response
     */
    public function show(Gamca $gamca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gamca  $gamca
     * @return \Illuminate\Http\Response
     */
    public function edit(Gamca $gamca)
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.gamca.edit', compact('gamca', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gamca  $gamca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gamca $gamca)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'country_id' => 'required',
            'details' => 'required',
            'status' => 'required|in:Active,Inactive',
        ]);

        $gamca->title = $request->title;
        $gamca->country_id = $request->country_id;
        $gamca->short_description = $request->short_description;
        $gamca->details = $request->details;
        $gamca->status = $request->status;
        $gamca->save();

        Alert::toast('Gamca successfully updated', 'success');

        return redirect()->route('admin.gamca.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gamca  $gamca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamca $gamca)
    {
        $gamca->delete();

        Alert::toast('Gamca successfully deleted', 'success');

        return redirect()->route('admin.gamca.index');
    }
}
