<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function teacherviewtimetable()
    {
        // Return the data to the view
        return view('ManageTimetable.TeacherViewTimetable');
    }

    public function guardianviewtimetable()
    {
        // Return the data to the view
        return view('ManageTimetable.ParentsViewTimetable');
    }

    public function kafaviewtimetable()
    {
        // Return the data to the view
        return view('ManageTimetable.KAFAViewTimetable');
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
