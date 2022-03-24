<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\HazzPackage;
use App\Models\News;
use App\Models\OverseasJob;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Ticketing;

class HomeController extends Controller
{
    /**
     * Show website home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::orderBY('name')->get();
        $overseasJobs = OverseasJob::active()->latest()->take(6)->get();
        $hazzPackages = HazzPackage::active()->latest()->take(6)->get();
        $tourPackages = Ticketing::active()->latest()->take(6)->get();
        $testimonials = Testimonial::active()->latest()->get();
        $news = News::active()->latest()->take(8)->get();
        //$events = Event::active()->latest()->take(3)->get();
        $sliders = Slider::active()->latest()->take(6)->get();
        //$projects = Project::with('type')->published()->whereIsFeatured(true)->orwhere('is_best', true)->latest()->take(9)->get();
        $settings = Setting::first();

        return view('frontend.pages.home', compact('countries', 'testimonials', 'news', 'sliders', 'settings', 'overseasJobs', 'hazzPackages', 'tourPackages'));
    }
}
