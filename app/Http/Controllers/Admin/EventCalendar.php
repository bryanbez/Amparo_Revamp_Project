<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

               if ($value->time_request_occupy == 0) {

                 $events[] = Calendar::event(
                     $value->reserve_purpose.' , '.$value->time_request_occupy,
                     true,
                     new \DateTime($value->date_request_occupy),
                     new \DateTime($value->date_request_occupy.' +1 day'),
                     null,
                     // Violet
                   [
                       'color' => '#4f0948',
                       'url' => '/record/'.$value->record_id,
                   ]
                 );

               } else if ($value->time_request_occupy == 1) {

                 $events[] = Calendar::event(
                     $value->reserve_purpose,
                     true,
                     new \DateTime($value->date_request_occupy),
                     new \DateTime($value->date_request_occupy.' +1 day'),
                     null,
                     // Green
                   [
                       'color' => '#32a852',
                       'url' => '/record/'.$value->record_id,
                   ]
                 );

               } else {
                  // Blue
                 $events[] = Calendar::event(
                     $value->reserve_purpose,
                     true,
                     new \DateTime($value->date_request_occupy),
                     new \DateTime($value->date_request_occupy.' +1 day'),
                     null,
                     // Add color and link on event
                   [
                       'color' => '#072ded',
                       'url' => '/record/'.$value->record_id,
                   ]
                 );

               }

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
