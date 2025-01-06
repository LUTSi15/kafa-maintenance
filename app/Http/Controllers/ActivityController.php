<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //KAFAAdmin
    /**
     * Display a listing of the activity in kafa page.
     */
    public function kafaManageActivity()
    {
        // Retrieve only activities with status "Approved" or "Rejected"
        $activities = Activity::whereIn('status', ['Approved', 'Rejected'])->get();

        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('kafa.manageActivity')],
        ];

        // Pass the filtered data to the view
        return view('ManageKAFAActivities.kafaActivity', [
            'activities' => $activities,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }



    // ActivityController.php

    public function kafaViewActivity(Activity $activity) //Page for activity details
    {

        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('kafa.manageActivity')],
            ['name' => 'Activity Detail', 'url' => route('kafa.viewActivity', $activity->id)],
        ];
        // Pass the activity details to the view
        return view('ManageKAFAActivities.kafaViewActivity', [
            'activity' => $activity,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }


    public function kafaAddActivity() //Page for adding new activity
    {
        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('kafa.manageActivity')],
            ['name' => 'Create Activity', 'url' => route('kafa.addActivity')],
        ];
        //Render and return the view for adding a new KAFA activity.
        // This view will contain the form where users can input details for a new activity.
        return view(
            'ManageKAFAActivities.kafaAddActivity',
            ['breadcrumbs' => $breadcrumbs]
        );
    }

    public function kafaEditActivity($id) //Page for editing activity
    {
        // Retrieve the activity record based on the provided ID
        $activity = Activity::find($id);

        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('kafa.manageActivity')],
            ['name' => 'Edit Activity', 'url' => route('kafa.editActivity', $activity->id)],
        ];

        // Check if the activity record exists
        if (!$activity) {
            // Redirect back with an error message if the activity does not exist
            return redirect()->back()->with('error', 'Activity not found.');
        }

        // Pass the activity details to the view for editing
        return view('ManageKAFAActivities.kafaEditActivity', [
            'activity' => $activity,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function kafaStoreActivity(Request $request) //Store new activity
    {
        $activity = new Activity();
        $activity->activityName = $request->input('activityName');
        $activity->venue = $request->input('venue');
        $activity->dateStart = $request->input('dateStart');
        $activity->dateEnd = $request->input('dateEnd');
        $activity->timeStart = $request->input('timeStart');
        $activity->timeEnd = $request->input('timeEnd');
        $activity->attendees = $request->input('attendees');
        $activity->organizerName = $request->input('organizerName');
        $activity->description = $request->input('description');
        $activity->kafa_id = $request->input('kafa_id');
        $activity->status = 'Request'; // Assuming default status is Request

        // Save the activity to the database
        $activity->save();

        // Redirect back with a success message
        return redirect()->route('kafa.manageActivity')->with('success', 'Activity created successfully.');
    }


    public function kafaDeleteActivity($id) //Delete activity
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

    public function kafaUpdateActivity(Request $request, Activity $activity) //Update activity
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

        //Update the activity with the validated data
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



    //MUIP
    /**
     * Display a listing of the activity in muip page.
     */
    public function muipManageActivity(Request $request)
    {
        $search = $request->input('search');
        $activities = Activity::where('status', 'Approved') // Filter only approved activities
            ->when($search, function ($query, $search) {
                return $query->where('activityName', 'like', '%' . $search . '%');
            })
            ->get();

        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('muip.manageActivity')],
        ];

        return view('ManageKAFAActivities.muipActivity', [
            'activities' => $activities,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }


    public function muipViewActivity(Activity $activity) //Page for activity details
    {
        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('muip.manageActivity')],
            ['name' => 'Activity Detail', 'url' => route('muip.viewActivity', $activity->id)],
        ];

        return view('ManageKAFAActivities.muipViewActivity', [
            'activity' => $activity,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function muipApproveActivity(Request $request) // Page for approving activity
    {
        $breadcrumbs = [
            ['name' => 'Approve Activity', 'url' => route('muip.approveActivity')],
        ];
        $search = $request->input('search');

        // Retrieve activities with the status 'Request' and matching the search query
        $activities = Activity::where('status', 'Request')
            ->where('activityName', 'like', '%' . $search . '%')
            ->get();

        return view('ManageKAFAActivities.muipApprovalActivity', compact('activities', 'breadcrumbs'));
    }

    public function batchActionActivities(Request $request)
    {
        $activityIds = $request->input('activity_ids', []); // Get selected activity IDs
        $action = $request->input('action'); // Determine the action (approve or reject)

        if (empty($activityIds)) {
            return redirect()->route('muip.approveActivity')
                ->with('error', 'No activities selected.');
        }

        switch ($action) {
            case 'approve':
                // Update the status of selected activities to 'Approved'
                Activity::whereIn('id', $activityIds)->update(['status' => 'Approved']);
                $message = 'Selected activities have been approved.';
                break;

            case 'reject':
                // Update the status of selected activities to 'Rejected'
                Activity::whereIn('id', $activityIds)->update(['status' => 'Rejected']);
                $message = 'Selected activities have been rejected.';
                break;

            default:
                $message = 'Invalid action.';
                break;
        }

        return redirect()->route('muip.approveActivity')
            ->with('success', $message);
    }


    public function approveActivity($id) //Approve activity
    {
        $activity = Activity::findOrFail($id); //Find the activity by ID
        $activity->status = 'Approved'; //Change the status to approved
        $activity->save(); //Save the changes

        return redirect()->route('muip.approveActivity')->with('success', 'Activity approved successfully.'); //Redirect back with a success message
    }

    public function rejectActivity($id) //Reject activity
    {
        $activity = Activity::findOrFail($id); //Find the activity by ID
        $activity->status = 'rejected'; //Change the status to rejected
        $activity->save(); //Save the changes

        return redirect()->route('muip.approveActivity')->with('success', 'Activity rejected successfully.'); //Redirect back with a success message
    }



    //Guardian
    /**
     * Display a listing of the activity in guardian page.
     */
    public function guardianManageActivity(Request $request) //Page for view activity list
    {

        $activities = Activity::whereIn('status', ['Approved'])->get();

        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('guardian.manageActivity')],
        ];

        // Pass the data to the view
        return view('ManageKAFAActivities.ParentsActivity', [
            'activities' => $activities,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }


    public function guardianViewActivity(Activity $activity) //Page for activity details
    {
        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('guardian.manageActivity')],
            ['name' => 'Activity Detail', 'url' => route('guardian.viewActivity', $activity->id)],
        ];
        // Pass the activity details to the view
        return view('ManageKAFAActivities.ParentsViewActivity', [
            'activity' => $activity,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }



    //Teacher
    /**
     * Display a listing of the activity in teacher page.
     */
    public function teacherManageActivity(Request $request) //Page for list activity
    {
        $search = $request->input('search');

        // Retrieve records from the activities table, filtering by the search term if provided
        $activities = Activity::where('status', 'Approved')->when($search, function ($query, $search) { //Filter by activity name
            return $query->where('activityName', 'like', '%' . $search . '%'); //Filter by activity name
        })->get(); //Get the filtered records

        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('teacher.manageActivity')],
        ];

        // Pass the data to the view
        return view('ManageKAFAActivities.teacherActivity', [
            'activities' => $activities,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }


    public function teacherViewActivity(Activity $activity) //Page for activity details
    {
        $breadcrumbs = [
            ['name' => 'Activity', 'url' => route('teacher.manageActivity')],
            ['name' => 'Activity Detail', 'url' => route('teacher.viewActivity', $activity->id)],
        ];
        // Pass the activity details to the view
        return view('ManageKAFAActivities.teacherViewActivity', [
            'activity' => $activity,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
