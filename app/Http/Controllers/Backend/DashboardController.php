<?php

namespace App\Http\Controllers\Backend;

use Analytics;
use App\Models\Career;
use App\Models\Feedback;
use Spatie\Analytics\Period;
use App\Models\ClientRequirement;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;

class DashboardController extends Controller
{
    /**
     * Handle dashboard data
     */
    public function index()
    {
        $totalVisitorsAndPageViews = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30));
        $mostVisitedPages = Analytics::fetchMostVisitedPages(Period::days(30))->take(5);
        $fetchUserTypes = Analytics::fetchUserTypes(Period::days(30));

       $visitors = [];
       $mostPageViews = [];
        foreach ($totalVisitorsAndPageViews as $totalVisitorsAndPageView) {
            $date[] = $totalVisitorsAndPageView['date']->format('jS M');
            $visitors[] = $totalVisitorsAndPageView['visitors'];
            $pageViews[] = $totalVisitorsAndPageView['pageViews'];
        }

       $pageTitle = [];
       $totalvisite = [];
        foreach ($mostVisitedPages as $mostVisitedPage) {
            $pageTitle[] = $mostVisitedPage['pageTitle'];
            $totalvisite[] = $mostVisitedPage['pageViews'];
        }

        $barChartData = ['date' => $date, 'visitors' => $visitors, 'pageViews' => $pageViews];
        $pieChartData = ['pageTitle' => $pageTitle, 'totalvisite' => $totalvisite];
        $newVisitor = $fetchUserTypes[0]['sessions'];
        $returningVisitor = $fetchUserTypes[1]['sessions'];

        $pendingVisitorFeedback  = ContactUs::where('status', false)->count();
        $activeJob               = Career::where('job_status', false)->count();

        return view('backend.dashboard', compact('pendingVisitorFeedback', 'activeJob', 'barChartData', 'pieChartData', 'newVisitor', 'returningVisitor'));
    }
}
