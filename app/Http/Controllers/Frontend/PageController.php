<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Agent;
use App\Models\Blog;
use App\Models\Career;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\Gamca;
use App\Models\HazzPackage;
use App\Models\LabarDiary;
use App\Models\News;
use App\Models\OrgContact;
use App\Models\OverseasJob;
use App\Models\PhotoGallery;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\Ticketing;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function overseasJob()
    {

        $overseasJobs = OverseasJob::active()->latest()->get();

        return view('frontend.pages.overseas-job', compact('overseasJobs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hazzPackage()
    {

        $hazzPackages = HazzPackage::active()->latest()->get();

        return view('frontend.pages.hazz-package', compact('hazzPackages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tourPackage()
    {

        $tourPackages = Ticketing::active()->latest()->get();

        return view('frontend.pages.tour-package', compact('tourPackages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gamca()
    {

        $gamca = Gamca::active()->latest()->get();

        return view('frontend.pages.gamca', compact('gamca'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orgContact()
    {

        $orgContacts = OrgContact::active()->latest()->get();

        return view('frontend.pages.org-contact', compact('orgContacts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function overseasJobDetails($id)
    {

        $overseasJob = OverseasJob::findOrFail($id);

        return view('frontend.pages.overseas-job-details', compact('overseasJob'));
    }
//--------------------------------------------------//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function countryDetails($id)
    {
        $countyServices = Country::with('hazzPackages', 'overseasJob', 'ticketing', 'gamca', 'orgcontact')->find($id);
        return view('frontend.pages.country-details', compact('countyServices'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hazzPackageDetails($id)
    {

        $hazzPackage = HazzPackage::findOrFail($id);

        return view('frontend.pages.hazz-package-details', compact('hazzPackage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tourPackageDetails($id)
    {

        $tourPackage = Ticketing::findOrFail($id);

        return view('frontend.pages.tour-package-details', compact('tourPackage'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gamcaDetails($id)
    {

        $gamca = Gamca::findOrFail($id);

        return view('frontend.pages.gamca-details', compact('gamca'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orgContactDetails($id)
    {

        $orgContact = OrgContact::findOrFail($id);

        return view('frontend.pages.org-contact-details', compact('orgContact'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {

        $news = News::active()->latest()->get();

        return view('frontend.pages.news', compact('news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {

        $blogs = Blog::active()->latest()->get();

        return view('frontend.pages.blog', compact('blogs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function staff()
    {

        $staffs = Staff::active()->latest()->get();

        return view('frontend.pages.staff', compact('staffs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function labarDiary()
    {

        $labarDiaries = LabarDiary::active()->latest()->get();

        return view('frontend.pages.labar-diary', compact('labarDiaries'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsDetails($id)
    {

        $news = News::find($id);

        return view('frontend.pages.news-details', compact('news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogDetails($id)
    {

        $blog = Blog::find($id);

        return view('frontend.pages.blog-details', compact('blog'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agent(Request $request)
    {
        return view('frontend.pages.agent');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeAgent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'contact_number' => 'required|max:20',
        ]);

        $booking = new Agent();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->contact_number = $request->contact_number;
        $booking->address = $request->address;
        $booking->message = $request->message;
        $booking->save();

        return back()->with('message', 'Congratulations! We will contact you soon.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        $settings = Setting::first();

        return view('frontend.pages.contact-us', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContactUs(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email',
            'contact_number' => 'required|max:20',
            'message' => 'required',
        ]);

        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->contact_number = $request->contact_number;
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->save();

        return back()->with('message', 'Your message sent successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs($id)
    {

        $aboutUs = AboutUs::find($id);

        return view('frontend.pages.about-us', compact('aboutUs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function career()
    {

        $careers = Career::published()->get();

        return view('frontend.pages.career', compact('careers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function photoGallery()
    {

        $photos = PhotoGallery::active()->get();

        return view('frontend.pages.photo-gallery', compact('photos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function careerDetails($id)
    {

        $career = Career::find($id);

        return view('frontend.pages.career-details', compact('career'));
    }
}
