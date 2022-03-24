<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\HazzPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HazzPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hazzPackages = HazzPackage::query();

        if ($request->searchKeyword) {
            $hazzPackages->where('title', 'LIKE', "%$request->searchKeyword%");
        }

        $hazzPackages = $hazzPackages->orderBy('title')->paginate(10);

        return view('backend.hazz_package.index', compact('hazzPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.hazz_package.create', compact('countries'));
    }

    /**
     * Store the blog details file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('hazz_package/details');

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
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {

            $data['featured_image'] = $request->file('featured_image')->store('overseas_job');
        }

        HazzPackage::create($data);

        Alert::toast('Overseas job successfully created', 'success');

        return redirect()->route('admin.hazz-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HazzPackage  $hazzPackage
     * @return \Illuminate\Http\Response
     */
    public function show(HazzPackage $hazzPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HazzPackage  $hazzPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(HazzPackage $hazzPackage)
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.hazz_package.edit', compact('hazzPackage', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HazzPackage  $hazzPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HazzPackage $hazzPackage)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Active,Inactive',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {

            if (Storage::exists($hazzPackage->featured_image)) {
                Storage::delete($hazzPackage->featured_image);
            }

            $data['featured_image'] = $request->file('featured_image')->store('overseas_job');
        }

        $hazzPackage->update($data);

        Alert::toast('Overseas job successfully updated', 'success');

        return redirect()->route('admin.hazz-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HazzPackage  $hazzPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HazzPackage $hazzPackage)
    {
        if (Storage::exists($hazzPackage->featured_image)) {
            Storage::delete($hazzPackage->featured_image);
        }

        $hazzPackage->delete();

        Alert::toast('Hazz package successfully deleted', 'success');

        return redirect()->route('admin.hazz-package.index');
    }
}
