<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ReserveCustomer;
use Calendar;
use Illuminate\Http\Request;

class EventCalendar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $events = [];
         $data = ReserveCustomer::all();
         if($data->count()) {
             foreach ($data as $key => $value) {

                 $events[] = Calendar::event(
                     $value->reserve_purpose.' , '.$value->time_request_occupy,
                     true,
                     new \DateTime($value->date_request_occupy),
                     new \DateTime($value->date_request_occupy.' +1 day'),
                     null,
                     // Violet
                   [
                       'color' => '#4f0948',
                       'url' => '/reserve/'.$value->request_form_no,
                   ]
                 );

             }
         }
         $calendar = Calendar::addEvents($events);
         return view('layouts.admin.event-calendar.display-calendar', compact('calendar', $calendar));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
