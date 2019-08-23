<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReserveCustomer;
use App\Record;
use Carbon\Carbon;

class ReportController extends Controller
{

    public function displayAllRecords() {
      $getTotalUpcoming = ReserveCustomer::all()->count();
      $getTodayReservation = ReserveCustomer::whereDate('created_at', '=', Carbon::now()->toDateString())->count();
      $getThisMonthReservation = ReserveCustomer::whereMonth('created_at', '=', Carbon::now()->month)->count();
      $getThisYearReservation = ReserveCustomer::whereYear('created_at', '=', Carbon::now()->year)->count();
      $getDoneEvents = Record::where('reserve_status', 'Approved')->count();
      $getCancelledEvents = Record::where('reserve_status', 'Cancelled')->count();
      $getallCurrReservation = ReserveCustomer::all()->count();
      $getallRecords = Record::all()->count();
      $totalCount = $getallCurrReservation + $getallRecords;
      $dateToday = Carbon::now()->toDateString();
      $getUpcomingEvent = ReserveCustomer::orderBy('date_request_occupy')->skip(0)->take(5)->get();
      $getUpdatedRecordsinReservation = ReserveCustomer::orderBy('updated_at', 'DESC')->skip(0)->take(5)->get();
      $getTodayEventOnGoing = ReserveCustomer::whereDate('date_request_occupy', '=', Carbon::now()->toDateString())->get();
    //  dd($getTodayEventOnGoing);
      return view('home', compact('getTotalUpcoming', 'getTodayReservation',
              'getThisMonthReservation', 'getThisYearReservation',
              'getDoneEvents', 'getCancelledEvents', 'totalCount',
              'dateToday', 'getUpcomingEvent', 'getUpdatedRecordsinReservation',
              'getTodayEventOnGoing'));
    }


}
