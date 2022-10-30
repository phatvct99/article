<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\View;

class StatisticController extends Controller
{

    public function index()
    {
        //
        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(29));
        $dates = $analyticsData->pluck('date');
        $visitors = $analyticsData->pluck('visitors',);
        $pageViews = $analyticsData->pluck('pageViews');
        // dd($analyticsData);
        $sum_pages = ($analyticsData->pluck('pageViews')->sum());
        $sum_visitors = ($analyticsData->pluck('visitors')->sum());
        //dd($avg);
        $usertype = Analytics::fetchUserTypes(Period::days(29));
        $topurl = Analytics::fetchMostVisitedPages(Period::days(29), 10);
        $topref = Analytics::fetchTopReferrers(Period::days(29));
        $topbrowsers = Analytics::fetchTopBrowsers(Period::days(29));
        $sum_sessions = ($topbrowsers->pluck('sessions')->sum());
        $avg = substr(floatval($sum_pages / $sum_sessions), 0, 4);

        $data = [
            'dates' => $dates,
            'visitors' => $visitors,
            'pageViews' => $pageViews,
            'topurl' => $topurl,
            'avg' => $avg,
            'topbrowsers' => $topbrowsers,
            'sum_sessions' => $sum_sessions,
            'sum_pages' => $sum_pages,
            'sum_visitors' => $sum_visitors,
            'usertype' => $usertype,
            'analyticsData' => $analyticsData,
            'topref' => $topref
        ];

        // dd($data);
        return view('backend.statistic.index-google-analyst', $data);
    }
}
