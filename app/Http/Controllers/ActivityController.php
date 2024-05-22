<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the activity in kafa page.
     */
    public function kafaManageActivity()
    {
        //
        return view('ManageKAFAActivities.kafaActivity');
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
