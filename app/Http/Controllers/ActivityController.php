<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the activity in kafa page.
     */
    public function kafaManageActivity()
    {
        // Retrieve all records from the activities table
        $activities = Activity::all();

        // Pass the data to the view
        return view('ManageKAFAActivities.kafaActivity', ['activities' => $activities]);
    }


 // ActivityController.php

    public function kafaViewActivity(Activity $activity)
    {
        // Pass the activity details to the view
        return view('ManageKAFAActivities.kafaViewActivity', ['activity' => $activity]);
    }


    public function kafaCreateActivity()
    {
        //
        return view('ManageKAFAActivities.kafaCreateActivity');
    }

    public function kafaEditActivity($id)
    {
        // Retrieve the activity record based on the provided ID
        $activity = Activity::find($id);
    
        // Check if the activity record exists
        if (!$activity) {
            // Redirect back with an error message if the activity does not exist
            return redirect()->back()->with('error', 'Activity not found.');
        }
    
        // Pass the activity details to the view for editing
        return view('ManageKAFAActivities.kafaEditActivity', ['activity' => $activity]);
    }

    public function kafaStoreActivity(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'activityName' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after_or_equal:dateStart',
            'timeStart' => 'required|date_format:H:i',
            'timeEnd' => 'required|date_format:H:i|after:timeStart',
            'attendees' => 'required|string|max:255',
            'organizerName' => 'required|string|max:255',
            'description' => 'required|string',
            'kafa_id' => 'required|exists:kafas,id',
    ]);

        // Create a new activity record with the validated data
        Activity::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('kafa.manageActivity')->with('success', 'Activity created successfully.');
    }

    public function kafaDeleteActivity($id)
    {
        // Retrieve the activity record based on the provided ID
        $activity = Activity::find($id);

        // Check if the activity record exists
        if ($activity) {
            // Delete the activity
            $activity->delete();

            // Redirect back or to a specific page after deletion
            return redirect()->route('kafa.manageActivity')->with('success', 'Activity deleted successfully.');
        } else {
            // Redirect back or display an error message if the activity does not exist
            return redirect()->route('kafa.manageActivity')->with('error', 'Activity not found.');
        }
    }

    public function kafaUpdateActivity(Request $request, Activity $activity)
    {
    
        // Check if the activity record exists
        if (!$activity) {
            // Redirect back or display an error message if the activity does not exist
            return redirect()->route('kafa.manageActivity')->with('error', 'Activity not found.');
        }
    
        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'activityName' => 'required|string|max:255',
        //     'venue' => 'required|string|max:255',
        //     'dateStart' => 'required|date',
        //     'dateEnd' => 'required|date|after_or_equal:dateStart',
        //     'attendees' => 'required|string|max:255',
        //     'organizerName' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'feedback' => 'nullable|string',
        // ]);

        $activity->update([
            'activityName' => $request->input('activityName'),
            'venue' => $request->input('venue'),
            'dateStart' => $request->input('dateStart'),
            'dateEnd' => $request->input('dateEnd'),
            'timeStart' => $request->input('timeStart'),
            'timeEnd' => $request->input('timeEnd'),
            'attendees' => $request->input('attendees'),
            'organizerName' => $request->input('organizerName'),
            'description' => $request->input('description'),
            'feedback' => $request->input('feedback'),
        ]);
    
    
        // Redirect back with a success message
        return redirect()->route('kafa.manageActivity')->with('success', 'Activity updated successfully.');
    }
 


    /**
     * Display a listing of the activity in muip page.
     */
    public function muipManageActivity(Request $request)
    {
        $search = $request->input('search');
        $activities = Activity::when($search, function ($query, $search) {
            return $query->where('activityName', 'like', '%' . $search . '%');
        })->get();
    
        return view('ManageKAFAActivities.muipActivity', ['activities' => $activities]);
    }
    
    public function muipViewActivity(Activity $activity)
    {
        return view('ManageKAFAActivities.muipViewActivity', ['activity' => $activity]);
    }
    
    public function muipApproveActivity(Request $request)
    {
        $search = $request->input('search');
        $activities = Activity::where('activityName', 'like', '%' . $search . '%')->get();
        return view('ManageKAFAActivities.muipApproveActivity', compact('activities'));
    }

    
    public function approveActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->status = 'approved';
        $activity->save();
    
        return redirect()->route('muip.approveActivity')->with('success', 'Activity approved successfully.');
    }
    
    public function rejectActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->status = 'rejected';
        $activity->save();
    
        return redirect()->route('muip.approveActivity')->with('success', 'Activity rejected successfully.');
    }

    /**
     * Display a listing of the activity in guardian page.
     */
    public function guardianManageActivity(Request $request)
    {
        $search = $request->input('search');

        // Retrieve records from the activities table, filtering by the search term if provided
        $activities = Activity::when($search, function ($query, $search) {
            return $query->where('activityName', 'like', '%' . $search . '%');
        })->get();

        // Pass the data to the view
        return view('ManageKAFAActivities.guardianActivity', ['activities' => $activities]);
    }


    public function guardianViewActivity(Activity $activity)
    {
        // Pass the activity details to the view
        return view('ManageKAFAActivities.guardianViewActivity', ['activity' => $activity]);
    }


     /**
     * Display a listing of the activity in teacher page.
     */
    public function teacherManageActivity(Request $request)
    {
        $search = $request->input('search');

        // Retrieve records from the activities table, filtering by the search term if provided
        $activities = Activity::when($search, function ($query, $search) {
            return $query->where('activityName', 'like', '%' . $search . '%');
        })->get();

        // Pass the data to the view
        return view('ManageKAFAActivities.teacherActivity', ['activities' => $activities]);
    }


    public function teacherViewActivity(Activity $activity)
    {
        // Pass the activity details to the view
        return view('ManageKAFAActivities.teacherViewActivity', ['activity' => $activity]);
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
