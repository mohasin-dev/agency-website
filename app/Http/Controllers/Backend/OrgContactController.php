<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\OrgContact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrgContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orgContacts = OrgContact::query();

        if ($request->searchKeyword) {
            $orgContacts->where('title', 'LIKE', "%$request->searchKeyword%");
        }

        $orgContacts = $orgContacts->orderBy('title')->paginate(10);

        return view('backend.org_contact.index', compact('orgContacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.org_contact.create', compact('countries'));
    }

    /**
     * Store the blog details file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('org_contact/details');

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

        $orgContact = new OrgContact();
        $orgContact->title = $request->title;
        $orgContact->country_id = $request->country_id;
        $orgContact->short_description = $request->short_description;
        $orgContact->details = $request->details;
        $orgContact->status = $request->status;
        $orgContact->save();

        Alert::toast('Org contact successfully created', 'success');

        return redirect()->route('admin.org-contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrgContact  $orgContact
     * @return \Illuminate\Http\Response
     */
    public function show(OrgContact $orgContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrgContact  $orgContact
     * @return \Illuminate\Http\Response
     */
    public function edit(OrgContact $orgContact)
    {
        $countries = Country::orderBy('name')->get();
        return view('backend.org_contact.edit', compact('orgContact', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrgContact  $orgContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrgContact $orgContact)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'country_id' => 'required',
            'details' => 'required',
            'status' => 'required|in:Active,Inactive',
        ]);

        $orgContact->title = $request->title;
        $orgContact->country_id = $request->country_id;
        $orgContact->short_description = $request->short_description;
        $orgContact->details = $request->details;
        $orgContact->status = $request->status;
        $orgContact->save();

        Alert::toast('Org contact successfully updated', 'success');

        return redirect()->route('admin.org-contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrgContact  $orgContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrgContact $orgContact)
    {
        $orgContact->delete();

        Alert::toast('Org contact successfully deleted', 'success');

        return redirect()->route('admin.org-contact.index');
    }
}
