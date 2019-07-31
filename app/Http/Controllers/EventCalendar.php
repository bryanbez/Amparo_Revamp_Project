<?php

namespace App\Http\Controllers;

use App\Record;
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
         $data = Record::all();
         if($data->count()) {
             foreach ($data as $key => $value) {
                 $events[] = Calendar::event(
                     $value->reserve_purpose,
                     true,
                     new \DateTime($value->date_request_occupy),
                     new \DateTime($value->date_request_occupy.' +1 day'),
                     null,
                     // Add color and link on event
                   [
                       'color' => '#f05050',
                       'url' => '/record/'.$value->record_id,
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
