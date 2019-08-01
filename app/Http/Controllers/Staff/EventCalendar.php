<?php

namespace App\Http\Controllers\Staff;

use App\Record;
use App\ReserveCustomer;
use Calendar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

      $pendingreservation = ReserveCustomer::all();
      // I cannot join the record and reservation tables because they are not related.

        if($pendingreservation->count()) {
            foreach ($pendingreservation as $key => $value) {
                $events[] = Calendar::event(
                    'Pending RSRV',
                    true,
                    new \DateTime($value->date_request_occupy),
                    new \DateTime($value->date_request_occupy.' +1 day'),
                    null,
                  ['color' => '#615b06', 'url' => '#' ]
                );
            }
          }

      $data = Record::all();
      if($data->count()) {
          foreach ($data as $key => $value) {

            if ($value->time_request_occupy == 'Whole Day') {
              // Not Available because whole day
              $events[] = Calendar::event(
                  'NOT AVAILABLE',
                  true,
                  new \DateTime($value->date_request_occupy),
                  new \DateTime($value->date_request_occupy.' +1 day'),
                  null,
                ['color' => '#868a8f', 'url' => '#' ]
              );

          }
          else {

            $events[] = Calendar::event(
                'RESERVED: '.$value->time_request_occupy,
                true,
                new \DateTime($value->date_request_occupy),
                new \DateTime($value->date_request_occupy.' +1 day'),
                null,
                // Violet
              ['color' => '#fc7f03', 'url' => '#']

            );

          }
      }
    }

      $calendar = Calendar::addEvents($events);
      return view('layouts.user.calendar.calendar', compact('calendar', $calendar));
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
