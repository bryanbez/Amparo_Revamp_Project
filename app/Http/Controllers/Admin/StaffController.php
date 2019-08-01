<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Staff::class);
        $fetchStaff = Staff::where('name', '!=', 'admin')->paginate(5);
        return view('layouts.admin.staffs.staffs-list', compact('fetchStaff', $fetchStaff));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($staffID)
    {
        $this->authorize('view', Staff::class);
        $specificStaff = Staff::where('id', $staffID)->get();
        //dd($specificStaff);
        return view('layouts.admin.staffs.update-staff-info', compact('specificStaff', $specificStaff));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $staffID)
    {

        $data = $request->validate([
            'txt_username' => 'required',
            'txt_email' => 'required',
        ]);

        Staff::where('id', $staffID)->update([
            'name' => $request->txt_username,
            'email' => $request->txt_email
        ]);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
