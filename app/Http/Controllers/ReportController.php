<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the activity.
     */
    public function kafaListReportActivity()
    {
        // Fetch activities with status "Approved" or "Finished"
        $activities = Activity::whereIn('status', ['Approved', 'Finished'])->get();

        $breadcrumbs = [
            ['name' => 'List of Report Activities', 'url' => route('kafa.listReportActivity')],
        ];

        // Return the data to KAFAListReportActivity page with filtered list of activities
        return view('ManageReportsAndActivities.KAFAListReportActivity', compact('activities', 'breadcrumbs'));
    }


    /**
     * Show the detail of the report activity.
     */
    public function kafaViewReportActivity(Activity $activity)
    {
        $breadcrumbs = [
            ['name' => 'List of Report Activities', 'url' => route('kafa.listReportActivity')],
            ['name' => 'Detail Report Activities', 'url' => route('kafa.viewReportActivity', $activity->id)],
        ];

        // Return the data to KAFAViewReportActivity page with the activity and breadcrumbs
        return view('ManageReportsAndActivities.KAFAViewReportActivity', compact('activity', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function KAFACreateReportActivity(Activity $activity)
    {
        $breadcrumbs = [
            ['name' => 'List of Report Activities', 'url' => route('kafa.listReportActivity')],
            ['name' => 'Create Report Activity', 'url' => route('kafa.createReportActivity', $activity->id)],
        ];

        // Return the data to KAFACreateReportActivity page with the activity and breadcrumbs
        return view('ManageReportsAndActivities.KAFACreateReportActivity', compact('activity', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function kafaUpdateReportActivity(Request $request, Activity $activity)
    {
        // Validate the incoming request data
        $request->validate([
            'feedback' => 'string',
        ]);

        // Update the activity with the validated data
        $activity->update([
            'status' => 'Finished',
            'feedback' => $request->input('feedback'),
        ]);

        // Redirect or return a response
        return redirect()->route('kafa.listReportActivity')->with('success', 'Activity updated successfully.');
    }

    /**
     * Display a listing of the activity.
     */
    public function muipListReportActivity()
    {
        $breadcrumbs = [
            ['name' => 'List of Report Activities', 'url' => route('muip.listReportActivity')],
        ];

        // Fetch all records from the 'activities' table where status is 'finished'
        $activities = Activity::where('status', 'finished')->get();

        // Return the data to MUIPListReportActivity page with list of activities
        return view('ManageReportsAndActivities.MUIPListReportActivity', compact('activities', 'breadcrumbs'));
    }

    /**
     * Show the detail of the report activity.
     */
    public function muipViewReportActivity(Activity $activity)
    {
        $breadcrumbs = [
            ['name' => 'List of Report Activities', 'url' => route('muip.listReportActivity')],
            ['name' => 'Detail Report Activities', 'url' => route('muip.viewReportActivity', $activity->id)],
        ];

        // Return the data to MUIPViewReportActivity page with the activity and breadcrumbs
        return view('ManageReportsAndActivities.MUIPViewReportActivity', compact('activity', 'breadcrumbs'));
    }
}
