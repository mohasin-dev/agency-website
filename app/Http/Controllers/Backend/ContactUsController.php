<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contactUs = ContactUs::query();

        if ($request->searchKeyword) {
            $contactUs->where('name',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('email',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('contact_number',  'LIKE', "%$request->searchKeyword%");
        }

        $contactUs = $contactUs->orderBy('name')->paginate(10);

        return view('backend.contact_us.index', compact('contactUs'));
    }

    /**
     * Update the visitor feedback status in reverse.
     *
     * @param  \App\Models\ContactUs  $feedback
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(ContactUs $contact)
    {
        $status = $contact->status;
        $contact->status = $status;
        $contact->save();

        Alert::toast('Status successfully updated', 'success');

        return redirect()->back();
    }
}
