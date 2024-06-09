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

    public function kafaCreateActivity()
    {
        //
        return view('ManageKAFAActivities.kafaAddActivity');
    }

    /**
     * Display a listing of the activity in muip page.
     */
    public function muipManageActivity()
    {
        //
        return view('ManageKAFAActivities.muipActivity');
    }

    /**
     * Display a listing of the activity in guardian page.
     */
    public function guardianManageActivity()
    {
        //
        return view('ManageKAFAActivities.guardianActivity');
    }

    /**
     * Display a listing of the activity in teacher page.
     */
    public function teacherManageActivity()
    {
        //
        return view('ManageKAFAActivities.teacherActivity');
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
