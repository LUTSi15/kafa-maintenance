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
        // Fetch all records from the 'activities' table
        $activities = Activity::all();

        // Return the data to KAFAListReportActivity page with list of activities
        return view('ManageReportsAndActivities.KAFAListReportActivity')->with('activities', $activities);
    }

    /**
     * Show the detail of the report activity.
     */
    public function kafaViewReportActivity(Activity $activity)
    {
        // Return the data to KAFAListReportActivity page with list of activities
        return view('ManageReportsAndActivities.KAFAViewReportActivity')->with('activity', $activity);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function KAFACreateReportActivity(Activity $activity)
    {
        // Return the data to KAFAViewReportActivity page with list of activities
        return view('ManageReportsAndActivities.KAFACreateReportActivity')->with('activity', $activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function kafaUpdateReportActivity(Request $request, Activity $activity)
    {
        // dd($request);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
